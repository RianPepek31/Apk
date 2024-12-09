<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use CodeIgniter\Controller;

class Appointments extends Controller
{
    public function index()
    {
        $model = new AppointmentModel();
        $data['appointments'] = $model->findAll();

        return view('appointments/index', $data);
    }

    public function create()
    {
        return view('appointments/create');
    }

    public function store()
    {
        $model = new AppointmentModel();

        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'appointment_date' => $this->request->getPost('appointment_date'),
            'description' => $this->request->getPost('description')
        ];

        if ($model->save($data)) {
            return redirect()->to('/appointments');
        } else {
            return view('appointments/create', ['validation' => $model->errors()]);
        }
    }

    public function edit($id)
    {
        $model = new AppointmentModel();
        $data['appointment'] = $model->find($id);

        return view('appointments/edit', $data);
    }

    public function update($id)
    {
        $model = new AppointmentModel();

        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'appointment_date' => $this->request->getPost('appointment_date'),
            'description' => $this->request->getPost('description')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/appointments');
        } else {
            return view('appointments/edit', ['validation' => $model->errors(), 'appointment' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new AppointmentModel();
        $model->delete($id);

        return redirect()->to('/appointments');
    }
}
