<?php

namespace App\Controllers;
use CodeIgniter\Session\SessionInterface;
use App\Models\Is_students;
use App\Models\Comment;
use \App\Controllers\Topics;

class Home extends BaseController
{
    protected $session;

    public function __construct(){
        $this->session = \config\Services::session();
    }

    public function index()
    {
        if($this->is_logged_in()){
            $topic = new Topics();
            
            $data = $topic->topics($this->session->has('user_name'));
            $data['user_name'] = $this->session->get('user_name');
           
            return view('users/header',$data)
            . view('users/home',$data)
            . view('users/footer');
        }else{
            return view('users/login');
        }
        
    }

    public function login()
    {
        return view('users/login');
    }

    public function save_count()
    {
        if ($this->request->getMethod() == 'post') {
            $user_name = $this->request->getVar('user_name');
            $user_fname = $this->request->getVar('user_fname');
            $nce = $this->request->getVar('nce');
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $password_conf = $this->request->getVar('password_conf');



            $rules = [
                'user_name' => 'required|min_length[8]|max_length[50]',
                'user_fname' => 'min_length[8]|max_length[50]',
                'nce' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_conf' => 'required|min_length[8]|max_length[255]|matches[password]',
            ];

            $messages = [
                'user_name' => [
                    'required' => 'Le champ Nom est obligatoire.',
                    'min_length' => 'Le champ Nom doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Nom ne peut pas dépasser 50 caractères.',
                ],
                'user_fname' => [
                    'min_length' => 'Le champ Nom doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Nom ne peut pas dépasser 50 caractères.',
                ],
                'nce' => [
                    'required' => 'Le champ nce est obligatoire.',
                ],
                'email' => [
                    'required' => 'Le champ Email est obligatoire.',
                    'valid_email' => 'Veuillez saisir une adresse email valide.',
                ],
                'password' => [
                    'required' => 'Le champ Mot de passe est obligatoire.',
                    'min_length' => 'Le champ Mot de passe doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Mot de passe ne peut pas dépasser 255 caractères.',
                ],
                'password_conf' => [
                    'required' => 'Le champ Mot de passe est obligatoire.',
                    'min_length' => 'Le champ Mot de passe doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Mot de passe ne peut pas dépasser 255 caractères.',
                    'matches' => 'Ces deux mot doivent identiques',
                ],
            ];

            if ($this->validate($rules, $messages)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $user_info = [
                    'user_name' => $user_name,
                    'user_fname' => $user_fname,
                    'nce' => $nce,
                    'email' => $email,
                    'password' => $password,
                ];
                $is_students = new Is_students();
                $querry = $is_students->save($user_info);
                if ($querry) {
                    return view('success.php');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('users/create_a_count',$data);
            }
        }
    }

    public function create_a_count()
    {
        return view('users/create_a_count');
    }

    public function login_validation()
    {

        if ($this->request->getMethod() == 'post') {
            $nce = $this->request->getVar('nce');
            $user_name = $this->request->getVar('user_name');
            $user_fname = $this->request->getVar('user_fname');
            $rules = [
                'user_name' => 'required|min_length[8]|max_length[50]',
                'user_fname' => 'min_length[8]|max_length[50]',
                'nce' => 'required',
                'password' => 'required|min_length[8]|max_length[255]|validateUsers[user_name,user_fname,nce,password]',
            ];

            $messages = [
                'user_name' => [
                    'required' => 'Le champ Nom est obligatoire.',
                    'min_length' => 'Le champ Nom doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Nom ne peut pas dépasser 50 caractères.',
                ],
                'user_fname' => [
                    'min_length' => 'Le champ Nom doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Nom ne peut pas dépasser 50 caractères.',
                ],
                'nce' => [
                    'required' => 'Le champ nce est obligatoire.',
                ],
                'password' => [
                    'required' => 'Le champ Mot de passe est obligatoire.',
                    'min_length' => 'Le champ Mot de passe doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Mot de passe ne peut pas dépasser 255 caractères.',
                    'validateUsers' => 'Mot de passe incorrect',
                ],
            ];

            if ($this->validate($rules, $messages)) {
                $userData = [
                    'user_name' => $user_name." ".$user_fname,
                ];
                $this->session->set($userData);
                return redirect()->to(site_url('Home'));
            } else {
                $data['validation'] = $this->validator;
                return view('users/login',$data);
            }
        }
    }

    private function is_logged_in(){
        if($this->session->has('user_name')){
            return true;
        }else{
            return false;
        }
    }

    public function log_out_prepare(){
       if($this->is_logged_in()){
            return view('users/header')
                . view('users/logout')
                . view('users/footer');
       }
    }
    public function log_out(){
        $this->session->remove('user_name');
        return redirect()->to(site_url('Home'));
    }

    public function show_a_art($var){
        if($this->is_logged_in()){
            $topic = new Topics();
            $data = $topic->topics($this->session->has('user_name'));
            foreach($data['topics'] as $topic){
                if($topic['id'] == $var){
                    $data['topic'] = [
                        'id' => $topic['id'],
                        'title' => $topic['title'],
                        'body' => $topic['body'],
                        'date' => $topic['date']
                    ];
                }
            }
            $data['user_name'] = $this->session->get('user_name');

            $data['comments'] = $this->upload_comment();
            
            return view('users/header')
            . view('users/show_a_article',$data);
       }else{
         return redirect()->to(site_url('Home/login'));
       }
    }

    public function comment($id_topic){
        $comment = new Comment();

        $data = [
            'id_topic' => $id_topic,
            'user_name' => $this->session->get('user_name'),
            'body' => $this->request->getVar('comment_body'),
        ];

        $comment->save($data); 
    }

    public function upload_comment(){
        $comment = new Comment();
        return $comment->findAll(); 
    }
}