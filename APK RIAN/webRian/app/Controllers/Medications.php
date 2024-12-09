<?php

namespace App\Controllers;

use App\Models\MedicationModel;
use App\Models\MedicalRecordModel;

use CodeIgniter\Controller;

class Medications extends Controller
{
    public function index()
    {
        $medicalRecordModel = new MedicalRecordModel();
        $model = new MedicationModel();
      
        $data['medications'] = $model->findAll();

        return view('medications/index', $data);
    }

    public function create()
    { 
        $medicalRecordModel = new MedicalRecordModel();

    // Ambil semua data dari tabel medical_records
    $data['medical_records'] = $medicalRecordModel->findAll();
        return view('medications/create',$data);
    }

    public function store()
    {
        $model = new MedicationModel();

        $data = [
            'record_id' => $this->request->getPost('record_id'),
            'medication_name' => $this->request->getPost('medication_name'),
            'dosage' => $this->request->getPost('dosage')
        ];

        if ($model->save($data)) {
            return redirect()->to('/medications');
        } else {
            return view('medications/create', ['validation' => $model->errors()]);
        }
    }

    public function edit($id)
    {
        $model = new MedicationModel();
        $data['medication'] = $model->find($id);

        return view('medications/edit', $data);
    }

    public function update($id)
    {
        $model = new MedicationModel();

        $data = [
            'record_id' => $this->request->getPost('record_id'),
            'medication_name' => $this->request->getPost('medication_name'),
            'dosage' => $this->request->getPost('dosage')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/medications');
        } else {
            return view('medications/edit', ['validation' => $model->errors(), 'medication' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new MedicationModel();
        $model->delete($id);

        return redirect()->to('/medications');
    }
}
