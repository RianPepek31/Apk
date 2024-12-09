<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'depart_id';
    protected $allowedFields = ['name', 'location'];
    protected $validationRules = [
        'name' => 'required|min_length[3]',
        'location' => 'required|min_length[3]',
    ];
}
