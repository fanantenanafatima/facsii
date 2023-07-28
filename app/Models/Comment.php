<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{
    protected $table = 'commentaires'; // Nom de la table dans la base de données
    protected $primaryKey = 'id'; // Clé primaire de la table
    protected $allowedFields = ['id_topic', 'user_name', 'body']; // Champs autorisés à être insérés
}

?>