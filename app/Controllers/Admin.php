<?php

namespace App\Controllers;

use CodeIgniter\Session\SessionInterface;
use CodeIgniter\Files\File;
use App\Models\Is_admin;
use App\Models\Articles;
use App\Models\Images_topic;
use \App\Controllers\Topics;

use Config\Validation;

class Admin extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = \config\Services::session();
    }
    public function index()
    {
        if ($this->is_logged_in()) {
            $topic = new Topics();
            $data = $topic->topics($this->session->has('user_name'));
            $data['user'] = $this->session->get('user_name');
            return view('admin/header',$data)
                . view('admin/home',$data);
        } else {
            return view('admin/login');
        }
    }

    public function login_validation()
    {
        if ($this->request->getMethod() == 'post') {
            $user_name = $this->request->getVar('user_name');
            $password = $this->request->getVar('password');

            $rules = [
                'user_name' => 'required|min_length[8]|max_length[100]',
                'password' => 'required|min_length[8]|max_length[255]|validateAdmin[user_name,password]',
            ];

            // Définir les messages d'erreur personnalisés
            $messages = [
                'user_name' => [
                    'required' => 'Le champ Nom est obligatoire.',
                    'min_length' => 'Le champ Nom doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Nom ne peut pas dépasser 50 caractères.',
                ],
                'password' => [
                    'required' => 'Le champ Mot de passe est obligatoire.',
                    'min_length' => 'Le champ Mot de passe doit comporter au moins 8 caractères.',
                    'max_length' => 'Le champ Mot de passe ne peut pas dépasser 255 caractères.',
                    'validateAdmin' => 'Mot de passe incorrect',
                ],
            ];

            // Effectuer la validation
            if ($this->validate($rules, $messages)) {
                $userData = [
                    'user_name' => $user_name,
                ];
                $this->session->set($userData);

                 return redirect()->to(site_url('Admin/'));

            } else {
                $data['validation'] = $this->validator;
                return view('admin/login', $data);
            }
        }
    }

    public function save_a_count()
    {

        if ($this->request->getMethod() == 'post') {
            $user_name = $this->request->getVar('user_name');
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $password_conf = $this->request->getVar('password_conf');



            $rules = [
                'user_name' => 'required|min_length[8]|max_length[60]',
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
                    'matches' => 'Ces deux mots de passes doivent identiques'
                ],
            ];

            if ($this->validate($rules, $messages)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $admin_info = [
                    'user_name' => $user_name,
                    'email' => $email,
                    'password' => $password,
                ];
                $is_admin = new Is_admin();
                $querry = $is_admin->save($admin_info);
                if ($querry) {
                    return view('success.php');
                } else {

                }
            } else {
                $data['validation'] = $this->validator;
                return view('admin/create_a_count', $data);
            }


        }

    }

    public function create_a_count()
    {
        return view('admin/create_a_count');
    }
    public function login()
    {
        return view('admin/login');
    }

    private function is_logged_in()
    {
        if ($this->session->has('user_name')) {
            return true;
        } else {
            return false;
        }
    }

    public function topics(){
        if($this->is_logged_in()){
            $topic = new Topics();
            $data = $topic->topics($this->session->has('user_name'));
            $data['user'] = $this->session->get('user_name');
            return view('Admin/header',$data)
            . view('Admin/topic',$data);
        }else{
            return redirect()->to(site_url('Admin/login'));
        }
    }

    public function logout(){
        $this->session->remove('user_name');
        return redirect()->to(site_url('/Admin'));
    }


}