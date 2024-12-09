<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use CodeIgniter\Controller;

class Departments extends Controller
{
    public function index()
    {
        $model = new DepartmentModel();
        $data['departments'] = $model->findAll();

        return view('departments/index', $data);
    }

    public function create()
    {
        return view('departments/create');
    }

    public function store()
    {
        $model = new DepartmentModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location')
        ];

        if ($model->save($data)) {
            return redirect()->to('/departments');
        } else {
            return view('departments/create', ['validation' => $model->errors()]);
        }
    }

    public function edit($id)
    {
        $model = new DepartmentModel();
        $data['department'] = $model->find($id);

        return view('departments/edit', $data);
    }

    public function update($id)
    {
        $model = new DepartmentModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/departments');
        } else {
            return view('departments/edit', ['validation' => $model->errors(), 'department' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new DepartmentModel();
        $model->delete($id);

        return redirect()->to('/departments');
    }
}
