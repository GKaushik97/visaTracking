<?php

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * Employee Experience
 */

class EmployeeExperience extends BaseController
{
    protected $employeeexperienceModel;
    protected $countryModel;

    public function __construct()
    {
        $this->employeeexperienceModel = model('App\Models\visaTracking\EmployeeexperienceModel');
        $this->countryModel = model('App\Models\visaTracking\CountryModel');
    }

    /**
     * To add Experience
     */
    public function add(): string 
    {
        $data['id'] = $this->request->getGet('id');
        $data['countries'] = $this->countryModel->findAll();

        $countries = $this->countryModel->findAll();
        foreach ($countries as $country ){
            $data['countries'][$country['id']] = $country;
        }
        return view('visaTracking/employee/add_experience', $data);
    }
        
    /**
     * To Insert Experience
     */
    public function create(): string 
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $data['id'] = $this->request->getPost('id');
            $rules = [
                'company_name' => ['label' => 'Company Name', 'rules' => 'required|alpha_space'],
                'designation' => ['label' => 'Designation', 'rules' => 'required|alpha_space'],
                'from_date' => ['label' => 'From Date', 'rules' => 'required'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'mobile' => ['label' => 'Mobile', 'rules' => 'required|numeric|exact_length[10]'],
                'address' => ['label' => 'Address', 'rules' => 'required'],
                'country' => ['label' => 'Country', 'rules' => 'required'],
            ];
            if($this->request->getPost('current_organisation') == "1") {
                $exp_details_ext = $this->employeeexperienceModel->where('employee_id', $data['id'])->where('current_organisation', 1)->find();
                if(isset($exp_details_ext) and !empty($exp_details_ext)) {
                    $rules['current_organisation1'] = array('rules' => 'required','errors' =>array('required' => 'Current Organisation has already been selected'));
                }
            }else {
                $rules['to_date'] = array('label' => 'To Date','rules' => 'required');
            }

            if ($this->validate($rules)) {
                $create_exp = array(
                    'employee_id' => $this->request->getPost("id"),
                    'company_name' => $this->request->getPost("company_name"),
                    'designation' => $this->request->getPost("designation"),
                    'from_date' => date('Y-m-d',strtotime($this->request->getPost('from_date'))),
                    'to_date' => $this->request->getPost('to_date') ? date('Y-m-d',strtotime($this->request->getPost('to_date'))) : NULL,
                    'email' => $this->request->getPost("email"),
                    'mobile' => $this->request->getPost("mobile"),
                    'address' => $this->request->getPost("address"),
                    'country' => $this->request->getPost("country"),
                    'current_organisation' => $this->request->getPost("current_organisation") ? $this->request->getPost('current_organisation') : 0,
                    'created_by' => $this->session->get('user')['id'],
                );
                
                $add_exp = $this->employeeexperienceModel->insert($create_exp);

                if ($add_exp) {
                    return alert_success("Experience added successfully");
                } else {
                    return alert_danger("Error while inserting. Please try again.");
                }
            } else {

                $countries = $this->countryModel->findAll();
                    foreach ($countries as $country ){
                        $data['countries'][$country['id']] = $country;
                    }
                $data['id'] = $this->request->getPost('id');
                return view('visaTracking/employee/add_experience', $data);
            }
        }
        
        // CSRF token validation failed
        return alert_danger("CSRF token validation failed.");
    }

    /**
     * To View Experience
     */
    public function viewEmployeeExperienceById()
    {     
        $id = $this->request->getGet('id');
        $data['emp_exp_details'] = $this->employeeexperienceModel->where('employee_id', $id)->orderBy('current_organisation','desc')->find();
        $data['emp_exp_count'] = $this->employeeexperienceModel->where('employee_id', $id)->countAllResults();
        // $data['countries'] = $this->countryModel->findAll();
        $countries_ext = $this->countryModel->findAll();
        foreach ($countries_ext as $country ){
            $data['countries'][$country['id']] = $country;
        }
        return view('visaTracking/employee/employee_exp_details', $data);
    }

    /**
     * To Edit Experience
     */
    public function edit(): string
    {
        $data['id'] = $this->request->getGet('id');
        $data['countries'] = $this->countryModel->findAll();
        $data['employeeexperience'] = $this->employeeexperienceModel->find($data['id']);

        // Loop through the countries to mark the selected one
        $countries = $this->countryModel->findAll();
        foreach ($countries as $country ){
        $data['countries'][$country['id']] = $country;
        }
        
        return view('visaTracking/employee/edit_experience', $data);
    }

    /**
     * To Update Experience
     */
    public function update(): string 
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $id = $this->request->getPost('id');
            $employee_id = $this->request->getPost('employee_id');
            $rules = [
                'company_name' => ['label' => 'Company Name', 'rules' => 'required|alpha_space'],
                'designation' => ['label' => 'Designation', 'rules' => 'required|alpha_space'],
                'from_date' => ['label' => 'From Date', 'rules' => 'required'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'mobile' => ['label' => 'Mobile', 'rules' => 'required|numeric|exact_length[10]'],
                'address' => ['label' => 'Address', 'rules' => 'required'],
                'country' => ['label' => 'Country', 'rules' => 'required'],
            ];
            $employee_cur_details = $this->employeeexperienceModel->where(['id' => $id, 'employee_id' => $employee_id,'current_organisation' => 1])->find();
            if(empty($employee_cur_details)) {
                if($this->request->getPost('current_organisation') == "1") {    
                    $exp_details_ext = $this->employeeexperienceModel->where('employee_id', $employee_id)->where('current_organisation', 1)->find();
                    if(isset($exp_details_ext) and !empty($exp_details_ext)) {
                        $rules['current_organisation1'] = array('rules' => 'required','errors' =>array('required' => 'Current Organisation has already been selected'));
                    }
                }else {
                    $rules['to_date'] = array('label' => 'To Date', 'rules' => 'required');
                }
            }else {
                if($this->request->getPost('current_organisation') != "1") {
                    $rules['to_date'] = array('label' => 'To Date', 'rules' => 'required');
                }
            }
            if ($this->validate($rules)) {
                $update_exp = array(
                    'company_name' => $this->request->getPost("company_name"),
                    'designation' => $this->request->getPost("designation"),
                    'from_date' => date('Y-m-d',strtotime($this->request->getPost("from_date"))),
                    'to_date' => $this->request->getPost('to_date') ? date('Y-m-d',strtotime($this->request->getPost("to_date"))) : NULL,
                    'email' => $this->request->getPost("email"), 
                    'mobile' => $this->request->getPost("mobile"),
                    'address' => $this->request->getPost("address"),
                    'country' => $this->request->getPost("country"),
                    'current_organisation' => $this->request->getPost("current_organisation") ? $this->request->getPost('current_organisation') : 0,
                    'updated_by' => $this->session->get('user')['id'],

                );
                $updated = $this->employeeexperienceModel->update($id, $update_exp);

                if ($updated) {
                    return alert_success("Experience updated successfully");
                } else {
                    return alert_danger("Error while updating. Please try again.");
                }
            } else {
                    $countries = $this->countryModel->findAll();
                    foreach ($countries as $country ){
                        $data['countries'][$country['id']] = $country;
                    }
                $data['params'] = $this->request->getPost();
                return view('visaTracking/employee/edit_experience', $data);
            }
        }else {

            return alert_danger("CSRF token validation failed.");
        }
        
    }

    /**
     * To Delete Experience
     */
    public function deleteEmployeeExperience()
    {
        $id = $this->request->getPost('id');
        $delete_employee_experience = $this->employeeexperienceModel->where('id', $id)->delete();
        if($delete_employee_experience) {
            return alert_success('Employee Experience deleted Successfully');
        } else {
            return alert_danger('An error occurred while deleting. Please try again.');
        }
    }
}
