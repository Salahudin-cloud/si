<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class Admin extends BaseController
{
    protected $employeeModel;
    public function __construct()
    {
        // initialize the model
        $this->employeeModel = new EmployeeModel();
    }

    // menu dashboard
    public function index()
    {
        //check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }

        return view('menu_admin/dashboard');
    }

    // menu employee data
    public function employeesManagerView()
    {
        //check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }

        // query employees 
        $data['employees'] = $this->employeeModel->getEmployees();

        return view('menu_admin/employees_manager', $data);
    }

    // menu add employee
    public function addEmployeeView()
    {
        //check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }

        return view('menu_admin/employees_manager_add');
    }

    // process add employee 
    public function addEmployeeProcess()
    {
        // import libarary validated
        $validation = \Config\Services::validation();

        //set valudation rules 
        $validation->setRules([
            'employeeName' => 'required',
            'position' => 'required',
            'department' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        // run  validation input 
        if (!$validation->withRequest($this->request)->run()) {
            // Validasi failed 
            $errors = $validation->getErrors();
            // show message  error it will return in the page with error message
            return redirect()->to('employees/new')->withInput()->with('errors', $errors);
        } else {

            // catch all input 
            $data = [
                'employeeName' => $this->request->getPost('employeeName'),
                'position' => $this->request->getPost('position'),
                'department' => $this->request->getPost('department'),
                'phoneNumber' => $this->request->getPost('phoneNumber'),
                'address' => $this->request->getPost('address'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => md5(json_encode($this->request->getPost('password')))
            ];

            // perform insert data
            $this->employeeModel->insertEmployee($data);

            // return to list employee
            return redirect()->to('/employees');
        }
    }

    // update employee view 
    public function updateEmployeeView($id)
    {
        //check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }

        // query employee by id 
        $data['employee'] = $this->employeeModel->getEmployeeById($id);

        // retrun view 
        return view('menu_admin/employees_manager_update', $data);
    }

    // update process 
    public function updateEmployeeProcess()
    {
        // import libarary validated
        $validation = \Config\Services::validation();

        //set valudation rules 
        $validation->setRules([
            'employeeName' => 'required',
            'position' => 'required',
            'department' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        // run  validation input 
        if (!$validation->withRequest($this->request)->run()) {
            // Validasi failed 
            $errors = $validation->getErrors();
            // show message  error it will return in the page with error message
            return redirect()->to('employees/new')->withInput()->with('errors', $errors);
        } else {

            $id = $this->request->getPost('employeeId');
            // catch all input 
            $data = [
                'employeeName' => $this->request->getPost('employeeName'),
                'position' => $this->request->getPost('position'),
                'department' => $this->request->getPost('department'),
                'phoneNumber' => $this->request->getPost('phoneNumber'),
                'address' => $this->request->getPost('address'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => md5(json_encode($this->request->getPost('password')))
            ];

            // perform insert data
            $this->employeeModel->updateEmployee($id, $data);

            // return to list employee
            return redirect()->to('/employees');
        }
    }


    public function deleteEmployeeProcess($id)
    {
        $this->employeeModel->deleteEmployee($id);
        return redirect()->to('/employees');
    }
}
