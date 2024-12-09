<?php

use CodeIgniter\Routes\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');


$routes->get('/', 'Dashboard::index');

$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);


// Route for Rooms
$routes->group('rooms', function($routes) {
    $routes->get('/', 'Rooms::index'); // List all rooms
    $routes->get('create', 'Rooms::create'); // Show form to create a room
    $routes->post('store', 'Rooms::store'); // Store new room
    $routes->get('edit/(:num)', 'Rooms::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'Rooms::update/$1'); // Update room
    $routes->post('delete/(:num)', 'Rooms::delete/$1'); // Delete room
});

// Route for Medications
$routes->group('medications', function($routes) {
    $routes->get('/', 'Medications::index'); // List all medications
    $routes->get('create', 'Medications::create'); // Show form to create a medication
    $routes->post('store', 'Medications::store'); // Store new medication
    $routes->get('edit/(:num)', 'Medications::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'Medications::update/$1'); // Update medication
    $routes->post('delete/(:num)', 'Medications::delete/$1'); // Delete medication
});

// Route for Payments
$routes->group('payments', function($routes) {
    $routes->get('/', 'Payments::index'); // List all payments
    $routes->get('create', 'Payments::create'); // Show form to create a payment
    $routes->post('store', 'Payments::store'); // Store new payment
    $routes->get('edit/(:num)', 'Payments::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'Payments::update/$1'); // Update payment
    $routes->post('delete/(:num)', 'Payments::delete/$1'); // Delete payment
});

// Route for Medical Records
$routes->group('medical_records', function($routes) {
    $routes->get('/', 'MedicalRecords::index'); // List all medical records
    $routes->get('create', 'MedicalRecords::create'); // Show form to create a medical record
    $routes->post('store', 'MedicalRecords::store'); // Store new medical record
    $routes->get('edit/(:num)', 'MedicalRecords::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'MedicalRecords::update/$1'); // Update medical record
    $routes->post('delete/(:num)', 'MedicalRecords::delete/$1'); // Delete medical record
});

// Route for PatientsCrontoller
$routes->group('patients', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'PatientController::index');
    $routes->get('create', 'PatientController::create');
    $routes->post('store', 'PatientController::store');
    $routes->get('edit/(:segment)', 'PatientController::edit/$1');
    $routes->post('update/(:segment)', 'PatientController::update/$1');
    $routes->get('delete/(:segment)', 'PatientController::delete/$1');
});

// Route for Invoices
$routes->group('invoices', function($routes) {
    $routes->get('/', 'Invoices::index'); // List all invoices
    $routes->get('create', 'Invoices::create'); // Show form to create an invoice
    $routes->post('store', 'Invoices::store'); // Store new invoice
    $routes->get('edit/(:num)', 'Invoices::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'Invoices::update/$1'); // Update invoice
    $routes->post('delete/(:num)', 'Invoices::delete/$1'); // Delete invoice
});

// Route for Doctors
$routes->group('doctors', function($routes) {
    $routes->get('/', 'Doctors::index'); // List all doctors
    $routes->get('create', 'Doctors::create'); // Show form to create a doctor
    $routes->post('store', 'Doctors::store'); // Store new doctor
    $routes->get('edit/(:num)', 'Doctors::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'Doctors::update/$1'); // Update doctor
    $routes->post('delete/(:num)', 'Doctors::delete/$1'); // Delete doctor
});

// Route for Departments
$routes->group('departments', function($routes) {
    $routes->get('/', 'Departments::index'); // List all departments
    $routes->get('create', 'Departments::create'); // Show form to create a department
    $routes->post('store', 'Departments::store'); // Store new department
    $routes->get('edit/(:num)', 'Departments::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'Departments::update/$1'); // Update department
    $routes->post('delete/(:num)', 'Departments::delete/$1'); // Delete department
});

// Route for Appointments
$routes->group('appointments', function($routes) {
    $routes->get('/', 'Appointments::index'); // List all appointments
    $routes->get('create', 'Appointments::create'); // Show form to create an appointment
    $routes->post('store', 'Appointments::store'); // Store new appointment
    $routes->get('edit/(:num)', 'Appointments::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'Appointments::update/$1'); // Update appointment
    $routes->post('delete/(:num)', 'Appointments::delete/$1'); // Delete appointment
});

// Route for Staff
$routes->group('staff', function($routes) {
    $routes->get('/', 'Staff::index'); // List all staff
    $routes->get('create', 'Staff::create'); // Show form to create staff
    $routes->post('store', 'Staff::store'); // Store new staff
    $routes->get('edit/(:num)', 'Staff::edit/$1'); // Show edit form
    $routes->post('update/(:num)', 'Staff::update/$1'); // Update staff
    $routes->post('delete/(:num)', 'Staff::delete/$1'); // Delete staff
});


