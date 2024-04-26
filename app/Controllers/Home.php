<?php

namespace App\Controllers;
class Home extends BaseController
{
    protected $employeeModel;
    protected $employeeVisaModel;
    public function __construct()
    {
        $this->employeeModel = model('App\Models\visaTracking\EmployeeModel');
        $this->employeeVisaModel = model('App\Models\visaTracking\EmployeeVisaModel');
    }
    public function index(): string
    {
        $data['page'] = array(
            'title' => 'Dashboard',
            'page_title' => 'Home',
            'layout' => 1,
        );
        $data['tot_employees'] = $this->employeeModel->countAllResults();
        $data['active_employees'] = $this->employeeModel->where(['employee_status' => 1])->countAllResults();
        $data['inactive_employees'] = $this->employeeModel->where(['employee_status' => 0])->countAllResults();
        $data['expiry_details'] = $this->employeeModel->getPassportExpiryDetails();
        $data['visa_expiry_details'] = $this->employeeVisaModel->getVisaExpiryDetails();
        // print "<pre>";print_r($data['visa_expiry_details']); print "</pre>";
        return view('dashboard', $data);
    }
}
