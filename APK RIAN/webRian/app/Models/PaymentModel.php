<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $allowedFields = ['invoice_id', 'payment_date', 'amount_paid'];
    protected $validationRules = [
        'invoice_id' => 'required|is_natural',
        'payment_date' => 'required|valid_date',
        'amount_paid' => 'required|decimal',
    ];
}
