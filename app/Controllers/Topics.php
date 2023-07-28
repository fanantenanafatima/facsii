<?php

namespace App\Controllers;

use CodeIgniter\Session\SessionInterface;
use CodeIgniter\Files\File;
use App\Models\Is_admin;
use App\Models\Articles;
use App\Models\Images_topic;
use \App\Controllers\Admin;

use Config\Validation;

class Topics extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = \config\Services::session();
    }

    private function is_logged_in()
    {
        if ($this->session->has('nce')) {
            return true;
        } else {
            return false;
        }
    }

    public function new_topic()
    {
        if ($this->is_logged_in()) {
            return view('articles/insert_topic');
        } else {
            echo "Page not found";
        }
    }

    public function insert_topic()
    {
        $success = true;

        if ($this->request->getMethod() == 'post') {
            $tab = array(
                'title' => $this->request->getVar('title_topic'),
                'body' => $this->request->getVar('topic_body'),
            );
            $articles = new Articles();
            $querry = $articles->save($tab);
            $id_topic = $articles->insertID();
            if ($querry) {

                $validationRule = [
                    'userfile' => [
                        'label' => 'Image File',
                        'rules' => [
                            'uploaded[userfile]',
                            'is_image[userfile]',
                            'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        ],
                    ],
                ];
                if (!$this->validate($validationRule)) {
                    if ($imagefile = $this->request->getFiles()) {
                        foreach ($imagefile['images'] as $img) {
                            if ($img->isValid() && !$img->hasMoved()) {
                                $newName = $img->getRandomName();
                                $img->move(ROOTPATH . 'public/image/images_topic', $newName);
                                $info = [
                                    'id_topic' => $id_topic,
                                    'name' => $newName,
                                ];

                                $img_tpc = new Images_topic();
                                $qr = $img_tpc->save($info);
                                if (!$qr) {
                                    $success = false;
                                }
                            }
                        }
                    } else {
                        $success = false;
                    }
                }
            } else {
                $success = false;
            }
        }

        if ($success) {
            echo "Articles ok";
        } else {
            echo "error";
        }
    }

    public function topics($var)
    {
        if ($var) {
            $articles = new Articles();
            $data['topics'] = $articles->orderby('id','DESC')->findAll();
            $images_topic = new Images_topic();
            $data['images_topic'] = $images_topic->findAll();
            return $data;
        }
    }

    public function update_topic($var)
    {
        if ($this->is_logged_in()) {
          $articles = new Articles();
          $data['topic'] = $articles->where('id',$var)->first();
          return view('admin/update_topic',$data);
        } else {
            echo "Page not found";
        }
    }

    public function update_it($var){
       
        $articles = new Articles();
        $images = new Images_topic();

        if ($this->request->getMethod() == 'post') {

            $data['images'] = $images->findAll();

            foreach($data['images'] as $images){
                if($var == $images['id_topic']){
                    $path = FCPATH.'image\\images_topic\\'.$images['name'];
                    if (file_exists($path)) {
                            // Supprimez le fichier
                            unlink($path);

                    }

                }
            }



            $tab = array(
                'title' => $this->request->getVar('title_topic'),
                'body' => $this->request->getVar('topic_body'),
            );

       // $articles->update($var, $tab);
            $validationRule = [
                    'userfile' => [
                        'label' => 'Image File',
                        'rules' => [
                            'uploaded[userfile]',
                            'is_image[userfile]',
                            'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        ],
                    ],
                ];
                if (!$this->validate($validationRule)) {
                    if ($imagefile = $this->request->getFiles()) {
                        foreach ($imagefile['images'] as $img) {
                            if ($img->isValid() && !$img->hasMoved()) {
                                $newName = $img->getRandomName();
                                $img->move(ROOTPATH . 'public/image/images_topic', $newName);
                                $info = [
                                    'id_topic' => $var,
                                    'name' => $newName,
                                ];

                                $img_tpc = new Images_topic();
                                $qr = $img_tpc->save($info);
                                if (!$qr) {
                                    $success = false;
                                }
                            }
                        }
                    } else {
                        $success = false;
                    }
                }

                $imgs = new Images_topic();
                $imgs->where('id_topic', $var)->delete();
        }

    }

    public function delete_topic($id){
        $articles = new Articles();
        $articles->where('id', $id)->delete();

        $images = new Images_topic();

        $data['images'] = $images->findAll();

            foreach($data['images'] as $images){
                if($id == $images['id_topic']){
                    $path = FCPATH.'image\\images_topic\\'.$images['name'];
                    if (file_exists($path)) {
                            // Supprimez le fichier
                            unlink($path);

                    }

                }
            }
        $imgs = new Images_topic();
        $imgs->where('id_topic', $id)->delete();

        return redirect()->to(site_url('Admin/topics'));
       
    }

}