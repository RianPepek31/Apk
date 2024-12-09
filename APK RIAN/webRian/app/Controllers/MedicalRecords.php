<?php

namespace App\Controllers;

use App\Models\MedicalRecordModel;
use App\Models\PatientModel;
use App\Models\DoctorModel;
use CodeIgniter\Controller;

class MedicalRecords extends Controller
{
    public function index()
    {   
        $patiens = new PatientModel();
        $doctor = new DoctorModel();

        $data['patients'] = $patiens->findall();
        $data['doctors'] = $doctor->findall();
        $model = new MedicalRecordModel();
        $data['medical_records'] = $model->findAll();
    
        return view('medical_records/index', $data);
    }

    public function create()
    {
        $patiens = new PatientModel();
        $doctor = new DoctorModel();

        $data['patients'] = $patiens->findall();
        $data['doctors'] = $doctor->findall();
        return view('medical_records/create',$data);
    }

   public function store()
{
    // Load models
    $patientModel = new PatientModel();
    $doctorModel = new DoctorModel();
    $medicalRecordModel = new MedicalRecordModel();

    // Validasi input
    if (!$this->validate([
        'patient_id' => 'required|is_natural',
        'doctor_id' => 'required|is_natural',
        'diagnosis' => 'required|min_length[3]',
        'treatment' => 'required|min_length[3]',
        'record_date' => 'required|valid_date',
    ])) {
        // Kirim ulang data dropdown jika validasi gagal
        $data['patients'] = $patientModel->findAll();
        $data['doctors'] = $doctorModel->findAll();
        $data['validation'] = $this->validator;

        return view('medical_records/create', $data);
    }

    // Data untuk disimpan
    $data = [
        'patient_id' => $this->request->getPost('patient_id'),
        'doctor_id' => $this->request->getPost('doctor_id'),
        'diagnosis' => $this->request->getPost('diagnosis'),
        'treatment' => $this->request->getPost('treatment'),
        'record_date' => $this->request->getPost('record_date'),
    ];

    // Simpan data dan redirect
    if ($medicalRecordModel->save($data)) {
        return redirect()->to('/medical_records')->with('success', 'Medical record added successfully!');
    } else {
        // Tampilkan error jika penyimpanan gagal
        return view('medical_records/create', [
            'validation' => $medicalRecordModel->errors(),
            'patients' => $patientModel->findAll(),
            'doctors' => $doctorModel->findAll(),
        ]);
    }
}


    public function edit($id)
    {
        $model = new MedicalRecordModel();
        $data['medical_record'] = $model->find($id);

        return view('medical_records/edit', $data);
    }

    public function update($id)
    {
        $model = new MedicalRecordModel();

        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'diagnosis' => $this->request->getPost('diagnosis'),
            'treatment' => $this->request->getPost('treatment'),
            'record_date' => $this->request->getPost('record_date')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/medical_records');
        } else {
            return view('medical_records/edit', ['validation' => $model->errors(), 'medical_record' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new MedicalRecordModel();
        $model->delete($id);

        return redirect()->to('/medical_records');
    }
}
