<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';

    protected $allowedFields = [
        'employeeId',
        'employeeName',
        'position',
        'department',
        'phoneNumber',
        'address',
        'email',
        'username',
        'password'
    ];

    //get data spesific by username and password 
    public function getEmployeeDataByUsernameAndPassword($username, $password)
    {
        $query = $this->db->table('employees')
            ->where('username', $username)
            ->where('password', md5($password))
            ->get();

        return $query->getRow();
    }

    // get all employees 
    public function getEmployees()
    {
        $query = $this->db->table('employees')
            ->get();
        return $query->getResult();
    }

    // insert new employee 
    public function insertEmployee($data)
    {
        $this->db->table('employees')->insert($data);
    }

    // get employee by id 
    public function getEmployeeById($id)
    {
        $query = $this->db->table('employees')
            ->where('employeeId', $id)->get();


        return $query->getRow();
    }

    //update employee 
    public function updateEmployee($id, $data)
    {
        $this->db->table('employees')->where('employeeId', $id)->update($data);
    }

    // delete employee
    public function deleteEmployee($id)
    {
        $this->db->table('employees')->where('employeeId', $id)->delete();
    }
}
