<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'patient_id';
    protected $allowedFields = ['name', 'dob', 'address', 'phone'];
    protected $validationRules = [
        'name' => 'required|min_length[3]',
        'dob' => 'required|valid_date',
        'address' => 'required|min_length[5]',
        'phone' => 'required|min_length[10]|max_length[15]',
    ];
}
