<?php

namespace App\Models;

use CodeIgniter\Model;

class Places extends Model
{
    protected $table      = 'places';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["latitude", "longitude", "place_name", "place_shortdesc", "place_description", "author"];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    # protected $deletedField  = 'deleted_at';

    # protected $validationRules    = [];
    # protected $validationMessages = [];
    # protected $skipValidation     = false;
}