<?php

namespace App\Models;

use CodeIgniter\Model;

class Articles extends Model
{
    protected $table = 'topic'; // Nom de la table dans la base de données
    protected $primaryKey = 'id'; // Clé primaire de la table
    protected $allowedFields = ['title', 'body']; // Champs autorisés à être insérés
}

?>