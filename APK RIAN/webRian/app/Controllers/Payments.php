<?php

namespace App\Controllers;

use App\Models\PaymentModel;
use CodeIgniter\Controller;

class Payments extends Controller
{
    public function index()
    {
        $model = new PaymentModel();
        $data['payments'] = $model->findAll();

        return view('payments/index', $data);
    }

    public function create()
    {
        $invoiceModel = new \App\Models\InvoiceModel();

    $data['invoices'] = $invoiceModel->findAll(); // Ambil semua data invoice
        return view('payments/create',$data);
    }

    public function store()
    {
        $model = new PaymentModel();

        $data = [
            'invoice_id' => $this->request->getPost('invoice_id'),
            'payment_date' => $this->request->getPost('payment_date'),
            'amount_paid' => $this->request->getPost('amount_paid')
        ];

        if ($model->save($data)) {
            return redirect()->to('/payments');
        } else {
            return view('payments/create', ['validation' => $model->errors()]);
        }
    }

    public function edit($id)
    {
        $model = new PaymentModel();
        $data['payment'] = $model->find($id);

        return view('payments/edit', $data);
    }

    public function update($id)
    {
        $model = new PaymentModel();

        $data = [
            'invoice_id' => $this->request->getPost('invoice_id'),
            'payment_date' => $this->request->getPost('payment_date'),
            'amount_paid' => $this->request->getPost('amount_paid')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/payments');
        } else {
            return view('payments/edit', ['validation' => $model->errors(), 'payment' => $data]);
        }
    }

    public function delete($id)
    {
        $model = new PaymentModel();
        $model->delete($id);

        return redirect()->to('/payments');
    }
}
