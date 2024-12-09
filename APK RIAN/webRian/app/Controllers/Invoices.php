<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\PatientModel;
use CodeIgniter\Controller;

class Invoices extends Controller
{
    public function index()
    {
        $model = new InvoiceModel();
        $data['invoices'] = $model->findAll();

        return view('invoices/index', $data);
    }

    public function create()
    {
        $patiens = new PatientModel();
       

        $data['patients'] = $patiens->findall();
        return view('invoices/create',$data);
    }

    public function store()
    {
        $model = new InvoiceModel();

        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'total_amount' => $this->request->getPost('total_amount'),
            'invoice_date' => $this->request->getPost('invoice_date')
        ];

        if ($model->save($data)) {
            return redirect()->to('/invoices');
        } else {
            return view('invoices/create', ['validation' => $model->errors()]);
        }
    }

    public function edit($id)
    {
        $model = new InvoiceModel();
        $data['invoice'] = $model->find($id);

        return view('invoices/edit', $data);
    }

    public function update($id)
    {
        $model = new InvoiceModel();

        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'total_amount' => $this->request->getPost('total_amount'),
            'invoice_date' => $this->request->getPost('invoice_date')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/invoices');
        } else {
            return view('invoices/edit', ['validation' => $model->errors(), 'invoice' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new InvoiceModel();
        $model->delete($id);

        return redirect()->to('/invoices');
    }
}
