<?php

namespace App\Controllers;

use App\Models\DoctorModel;
use CodeIgniter\Controller;

class Doctors extends Controller
{
    public function index()
    {
        $model = new DoctorModel();
        $data['doctors'] = $model->findAll();

        return view('doctors/index', $data);
    }

    public function create()
    {
        return view('doctors/create');
    }

    public function store()
    {
        $model = new DoctorModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'specialization' => $this->request->getPost('specialization'),
            'phone' => $this->request->getPost('phone')
        ];

        if ($model->save($data)) {
            return redirect()->to('/doctors');
        } else {
            return view('doctors/create', ['validation' => $model->errors()]);
        }
    }

    public function edit($id)
    {
        $model = new DoctorModel();
        $data['doctor'] = $model->find($id);

        return view('doctors/edit', $data);
    }

    public function update($id)
    {
        $model = new DoctorModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'specialization' => $this->request->getPost('specialization'),
            'phone' => $this->request->getPost('phone')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/doctors');
        } else {
            return view('doctors/edit', ['validation' => $model->errors(), 'doctor' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new DoctorModel();
        $model->delete($id);

        return redirect()->to('/doctors');
    }
}
