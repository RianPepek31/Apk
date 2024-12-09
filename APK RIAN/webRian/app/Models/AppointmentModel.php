<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';
    protected $allowedFields = ['patient_id', 'doctor_id', 'appointment_date', 'description'];
    protected $validationRules = [
        'patient_id' => 'required|is_natural',
        'doctor_id' => 'required|is_natural',
        'appointment_date' => 'required|valid_date',
        'description' => 'permit_empty|min_length[3]',
    ];
}
