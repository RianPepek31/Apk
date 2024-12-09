<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'invoice_id';
    protected $allowedFields = ['patient_id', 'total_amount', 'invoice_date'];
    protected $validationRules = [
        'patient_id' => 'required|is_natural',
        'total_amount' => 'required|decimal',
        'invoice_date' => 'required|valid_date',
    ];
}
