<?php
namespace App\Models;

use CodeIgniter\Model;

class MedicalRecordModel extends Model
{
    protected $table = 'medical_records';
    protected $primaryKey = 'record_id';
    protected $allowedFields = ['patient_id', 'doctor_id', 'diagnosis', 'treatment', 'record_date'];

    public function getAllRecords()
    {
        // Lakukan join untuk mendapatkan nama pasien dan nama dokter
        return $this->select('medical_records.*, patients.name as patient_name, doctors.name as doctor_name')
                    ->join('patients', 'patients.patient_id = medical_records.patient_id')
                    ->join('doctors', 'doctors.doctor_id = medical_records.doctor_id')
                    ->findAll();
    }
}
