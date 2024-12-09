<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\DepartmentModel;
use CodeIgniter\Controller;

class Rooms extends Controller
{
    public function index()
    {
        $model = new RoomModel();
        $data['rooms'] = $model->findAll();

        return view('rooms/index', $data);
    }

    public function create()
    {
        $model = new DepartmentModel();
        $data['departemen'] = $model->findAll();
        return view('rooms/create',$data);
    }

    public function store()
    {
        $model = new DepartmentModel();
        $model = new RoomModel();

        $data = [
            'department_id' => $this->request->getPost('depart_id'),
            'room_number' => $this->request->getPost('room_number'),
            'capacity' => $this->request->getPost('capacity'),
        ];

        if ($model->save($data)) {
            return redirect()->to('/rooms');
        } else {
            return view('rooms/create', ['validation' => $model->errors()]);
        }
    }

    public function edit($id)
    {
        $model = new RoomModel();
        $data['room'] = $model->find($id);

        return view('rooms/edit', $data);
    }

    public function update($id)
    {
        $model = new RoomModel();

        $data = [
            'department_id' => $this->request->getPost('department_id'),
            'room_number' => $this->request->getPost('room_number'),
            'capacity' => $this->request->getPost('capacity'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/rooms');
        } else {
            return view('rooms/edit', ['validation' => $model->errors(), 'room' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new RoomModel();
        $model->delete($id);

        return redirect()->to('/rooms');
    }
}
