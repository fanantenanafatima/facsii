<?php

namespace App\Models;

use CodeIgniter\Model;

class Is_admin extends Model
{
    protected $table = 'admin'; // Nom de la table dans la base de données
    protected $primaryKey = 'id'; // Clé primaire de la table
    protected $allowedFields = ['user_name', 'email', 'password']; // Champs autorisés à être insérés
}

?>