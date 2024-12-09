<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicationModel extends Model
{
    protected $table = 'medications';
    protected $primaryKey = 'medication_id';
    protected $allowedFields = ['record_id', 'medication_name', 'dosage'];
    protected $validationRules = [
        'record_id' => 'required|is_natural',
        'medication_name' => 'required|min_length[3]',
        'dosage' => 'required|min_length[2]',
    ];
}
