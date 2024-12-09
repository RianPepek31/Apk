<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';
    protected $allowedFields = ['department_id', 'name', 'position', 'phone'];
  
}
