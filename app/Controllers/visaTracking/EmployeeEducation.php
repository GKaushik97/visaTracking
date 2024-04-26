<?php

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * Employee Education
 */
class EmployeeEducation extends BaseController
{
    protected $employeeEducationModel;
    protected $educationalQualificationModel;

    public function __construct()
    {
        $this->employeeEducationModel = model('App\Models\visaTracking\EmployeeEducationModel');
        $this->educationalQualificationModel = model('App\Models\visaTracking\EducationalQualificationModel');

    }

    /**
     * To Add Employee Education
     */
    public function add(): string 
    {
        $data['emp_id'] = $this->request->getGet('id');
        // $data['educationalQualification'] = $this->educationalQualificationModel->findAll();
        $educationalQualification = $this->educationalQualificationModel->findAll();
        foreach ($educationalQualification as $edu_qualification ){
            $data['educationalQualification'][$edu_qualification['id']] = $edu_qualification;
        }
        return view('visaTracking/employee/add_education',$data);
    }

    /**
     * To Create Employee Education
     */
    public function create(): string 
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $rules = [
                "edu_qualification" => ["label" => "Education Qualification", "rules" => "required"],
                "course" => ["label" => "Course Name", "rules" => "required"],
                "university" => ["label" => "University", "rules" => "required|alpha_space"],
                "start_year" => ["label" => "Start Year", "rules" => "required"],
                "end_year" => ["label" => "End Year", "rules" => "required"],
                "certificate_no" => ["label" => "Certificate Number","rules" => "required|trim|alpha_numeric"],
                "graduated_year" => ["label" => "Graduated Year", "rules" => "required"],
            ];

            if ($this->validate($rules)) {

                $id = $this->request->getPost("id");
                $create_edu = array(
                    "employee_id" => $this->request->getPost("id"),
                    "edu_qualification" =>$this->request->getPost("edu_qualification"),
                    "course" => $this->request->getPost("course"),
                    "university" => $this->request->getPost("university"),
                    'start_year' => $this->request->getPost('start_year'),
                    'end_year' => $this->request->getPost('end_year'),
                    'graduated_year' => $this->request->getPost('graduated_year'),
                    'certificate_no' => $this->request->getPost('certificate_no'),
                );

                $add_edu = $this->employeeEducationModel->insert($create_edu);

                if ($add_edu) {
                    return alert_success("Education Added successfully!");
                } else {
                    return alert_danger("Error while inserting");
                }
            } else {
                $data['emp_id'] = $this->request->getPost('id');
                $educationalQualification = $this->educationalQualificationModel->findAll();
                foreach ($educationalQualification as $edu_qualification ){
                $data['educationalQualification'][$edu_qualification['id']] = $edu_qualification;
                }
               
                return view('visaTracking/employee/add_education', $data);
            }
        }
    }

    /**
     * To Edit Employee Education
     */
    public function edit(): string 
    {
        $data['id'] = $this->request->getGet('id');
        $data['education'] = $this->employeeEducationModel->find($data['id']);
        $educationalQualification = $this->educationalQualificationModel->findAll();
        foreach ($educationalQualification as $edu_qualification ){
            $data['educationalQualification'][$edu_qualification['id']] = $edu_qualification;
        }        return view('visaTracking/employee/edit_education', $data);
    }

    /**
     * To Update Employee Education
     */
    public function update(): string 
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $rules = [
                "edu_qualification" => ["label" => "Education Qualification", "rules" => "required"],
                "course" => ["label" => "Course Name", "rules" => "required"],
                "university" => ["label" => "University", "rules" => "required"],
                "start_year" => ["label" => "Start Year", "rules" => "required"],
                "end_year" => ["label" => "End Year", "rules" => "required"],
                "certificate_no" => ["label" => "Certificate Number","rules" => "required|trim|alpha_numeric"],
                "graduated_year" => ["label" => "Graduated Year", "rules" => "required"],
            ];

            if ($this->validate($rules)) {
                $id = $this->request->getPost("id");
                $update_edu = array(
                    "edu_qualification" =>$this->request->getPost("edu_qualification"),
                    "course" => $this->request->getPost("course"),
                    "university" => $this->request->getPost("university"),
                    'start_year' => $this->request->getPost('start_year'),
                    'end_year' => $this->request->getPost('end_year'),
                    'graduated_year' => $this->request->getPost('graduated_year'),
                    'certificate_no' => $this->request->getPost('certificate_no'),
                );

                $update_result = $this->employeeEducationModel->update($id, $update_edu);

                if ($update_result) {
                    return alert_success("Education updated successfully!");
                } else {
                    return alert_danger("Error while updating");
                }
            } else {
                $data['education'] = $this->request->getPost();
                $educationalQualification = $this->educationalQualificationModel->findAll();
                foreach ($educationalQualification as $edu_qualification ){
                $data['educationalQualification'][$edu_qualification['id']] = $edu_qualification;
                }
                return view('visaTracking/employee/edit_education', $data);
            }
        }
    }

    /**
     * To View Employee By ID
     */
    public function viewEmployeeEducationById()
    {     
        $id = $this->request->getGet('id');
        $data['education_details'] = $this->employeeEducationModel->where('employee_id', $id)->find();
        $data['education_count'] = $this->employeeEducationModel->where('employee_id', $id)->countAllResults();
        $educationalQualification = $this->educationalQualificationModel->findAll();
        foreach ($educationalQualification as $edu_qualification ){
            $data['educationalQualification'][$edu_qualification['id']] = $edu_qualification;
        }
        return view('visaTracking/employee/educational_details', $data);
    }

    /** 
     * To Delete Employee Education
     */ 
    public function deleteEmployeeEducation()
    {
        $id = $this->request->getPost('id');
        $delete_employee_education = $this->employeeEducationModel->where('id', $id)->delete();
        if($delete_employee_education) {
            return alert_success('Employee Education deleted Successfully!');
        }else {
            return alert_danger('Error in Deleting!.. please try again');
        }
    }

}
