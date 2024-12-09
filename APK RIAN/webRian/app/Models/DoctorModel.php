<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'doctor_id';
    protected $allowedFields = ['name', 'specialization', 'phone'];
    protected $validationRules = [
        'name' => 'required|min_length[3]',
        'specialization' => 'required|min_length[3]',
        'phone' => 'required|min_length[10]|max_length[15]',
    ];
}
