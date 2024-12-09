<?php

namespace App\Controllers;

use App\Models\PatientModel;
use CodeIgniter\Controller;

class PatientController extends BaseController
{
    // Display the list of patients
    public function index()
    {
        $model = new PatientModel();
        $data['patients'] = $model->findAll();
        return view('patients/index', $data);
    }

    // Show the create patient form
    public function create()
    {
        return view('patients/create');
    }

    // Store new patient data
    public function store()
    {
        $model = new PatientModel();

        // Validate input data
        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'dob' => 'required|valid_date',
            'address' => 'required|min_length[5]',
            'phone' => 'required|min_length[10]|max_length[15]',
        ])) {
            return view('patients/create', ['validation' => $this->validator]);
        }

        // Prepare the data for saving
        $data = [
            'name' => $this->request->getPost('name'),
            'dob' => $this->request->getPost('dob'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
        ];

        // Save the patient data
        $model->save($data);

        return redirect()->to('/patients')->with('success', 'Patient added successfully!');
    }

    // Show the edit form for a specific patient
    public function edit($id)
    {
        $model = new PatientModel();
        $data['patient'] = $model->find($id);
        return view('patients/edit', $data);
    }

    // Update existing patient data
    public function update($id)
    {
        $model = new PatientModel();

        // Validate the input data
        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'dob' => 'required|valid_date',
            'address' => 'required|min_length[5]',
            'phone' => 'required|min_length[10]|max_length[15]',
        ])) {
            return view('patients/edit', ['validation' => $this->validator, 'patient' => $this->request->getPost()]);
        }

        // Prepare the data to update
        $data = [
            'name' => $this->request->getPost('name'),
            'dob' => $this->request->getPost('dob'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
        ];

        // Update the patient data
        $model->update($id, $data);

        return redirect()->to('/patients')->with('success', 'Patient updated successfully!');
    }

    // Delete a patient
    public function delete($id)
    {
        $model = new PatientModel();
        $model->delete($id);
        return redirect()->to('/patients')->with('success', 'Patient deleted successfully!');
    }
}
