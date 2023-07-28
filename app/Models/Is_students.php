<?php

namespace App\Models;

use CodeIgniter\Model;

class Is_students extends Model
{
    protected $table = 'students'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['user_name','user_fname', 'nce', 'email', 'password']; 
}

?>