<?php

namespace App\Models;

use CodeIgniter\Model;

class Images_topic extends Model
{
    protected $table = 'images_topics'; // Nom de la table dans la base de données
    protected $primaryKey = 'id'; // Clé primaire de la table
    protected $allowedFields = ['id_topic', 'name']; // Champs autorisés à être insérés
}

?>