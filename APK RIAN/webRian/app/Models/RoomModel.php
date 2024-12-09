<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'room_id';
    protected $allowedFields = ['department_id', 'room_number', 'capacity'];
    protected $validationRules = [
        'department_id' => 'required|is_natural',
        'room_number' => 'required|min_length[1]|max_length[10]',
        'capacity' => 'required|is_natural',
    ];
}
