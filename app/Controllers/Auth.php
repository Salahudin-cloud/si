<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class Auth extends BaseController
{
    protected  $employeeModel;
    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }
    public function index()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $request = $this->request;
        //catch data 
        $username =  $request->getPost('username');
        $password =  $request->getPost('password');

        // Load the form validation library
        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'username' => 'required|alpha_numeric',
            'password' => 'required'
        ]);

        // Run validation
        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, redirect back with errors
            $session->setFlashdata('error', $validation->getErrors());
            return redirect()->to('/');
        }

        $data = $this->employeeModel->getEmployeeDataByUsernameAndPassword($username, $password);
        if (!empty($data)) {

            //set common cookie data
            session()->set([
                'employeeId' => $data->employeeId,
                'employeeName' => $data->employeeName,
                'position' => $data->position,
                'department' => $data->department,
                'phoneNumber' => $data->phoneNumber,
                'address' => $data->address,
                'email' => $data->email,
                'username' => $data->username,
                'password' => $data->password,
                'isLogin' => true
            ]);

            // set destination 
            if ($data->position == 'HRIS Administrator') {
                return redirect()->to('/dashboard');
            }else {
                
                return redirect()->to('/employess_dashboard');
            }
        } else {
            $session->setFlashdata('error', 'failed');
            return redirect()->to('/');
        }
    }



    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }
}
