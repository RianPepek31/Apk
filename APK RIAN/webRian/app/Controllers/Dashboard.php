<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PatientModel;
use App\Models\DoctorModel;
use App\Models\DepartmentModel;
use App\Models\AppointmentModel;
use App\Models\InvoiceModel;
use App\Models\PaymentModel;
use App\Models\MedicalRecordModel;
use App\Models\MedicationModel;
use App\Models\RoomModel;
use App\Models\StaffModel;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard/index');
    }

    public function patients()
    {
        $model = new PatientModel();
        $data['patients'] = $model->findAll();
        return view('patients/index', $data);
    }

    public function doctors()
    {
        $model = new DoctorModel();
        $data['doctors'] = $model->findAll();
        return view('doctors/index', $data);
    }

    public function departments()
    {
        $model = new DepartmentModel();
        $data['departments'] = $model->findAll();
        return view('departments/index', $data);
    }

    public function appointments()
    {
        $model = new AppointmentModel();
        $data['appointments'] = $model->findAll();
        return view('appointments/index', $data);
    }

    public function invoices()
    {
        $model = new InvoiceModel();
        $data['invoices'] = $model->findAll();
        return view('invoices/index', $data);
    }

    public function payments()
    {
        $model = new PaymentModel();
        $data['payments'] = $model->findAll();
        return view('payments/index', $data);
    }

    public function medicalRecords()
    {
        $model = new MedicalRecordModel();
        $data['medical_records'] = $model->findAll();
        return view('medical_records/index', $data);
    }

    public function medications()
    {
        $model = new MedicationModel();
        $data['medications'] = $model->findAll();
        return view('medications/index', $data);
    }

    public function rooms()
    {
        $model = new RoomModel();
        $data['rooms'] = $model->findAll();
        return view('rooms/index', $data);
    }

    public function staff()
    {
        $model = new StaffModel();
        $data['staff'] = $model->findAll();
        return view('staff/index', $data);
    }
}
