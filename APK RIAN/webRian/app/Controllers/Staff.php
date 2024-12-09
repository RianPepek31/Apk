<?php

namespace App\Controllers;

use App\Models\StaffModel;
use App\Models\DepartmentModel;
use CodeIgniter\Controller;

class Staff extends Controller
{
    public function index()
    {
        $model = new StaffModel();
        $data['staff'] = $model->findAll();

        return view('staff/index', $data);
    }

    public function create()
    { 
        $model = new DepartmentModel();
        $data['departemen'] = $model->findAll();
        return view('staff/create',$data);
    }

    public function store()
    {
        $model = new StaffModel();

        $data = [
            'department_id' => $this->request->getPost('department_id'),
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'phone' => $this->request->getPost('phone')
        ];

        if ($model->save($data)) {
            return redirect()->to('/staff');
        } else {
            return view('staff/create', ['validation' => $model->errors()]);
        }
    }

    public function edit($id)
    {
        $model = new StaffModel();
        $data['staff'] = $model->find($id);

        return view('staff/edit', $data);
    }

    public function update($id)
    {
        $model = new StaffModel();

        $data = [
            'department_id' => $this->request->getPost('department_id'),
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'phone' => $this->request->getPost('phone')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/staff');
        } else {
            return view('staff/edit', ['validation' => $model->errors(), 'staff' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new StaffModel();
        $model->delete($id);

        return redirect()->to('/staff');
    }
}
