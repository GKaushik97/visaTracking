<?php
namespace app\Controllers\visaTracking;
use App\Controllers\BaseController;
/**
 * Employees Controller
 */
class FamilyDetails extends BaseController
{
    protected $employeeModel;
    protected $countryModel;
    protected $stateModel;
    protected $districtModel;
    protected $familyRelationModel;
    protected $employeeFamilyModel;
    public function __construct()
    {
        $this->employeeModel = model('App\Models\visaTracking\EmployeeModel');
        $this->countryModel = model('App\Models\visaTracking\CountryModel');
        $this->stateModel = model('App\Models\visaTracking\StateModel');
        $this->districtModel = model('App\Models\visaTracking\DistrictModel');
        $this->familyRelationModel = model('App\Models\visaTracking\FamilyRelationModel');
        $this->employeeFamilyModel = model('App\Models\visaTracking\EmployeeFamilyModel');
    }

    /**
     * Add Family Details
     */ 
    public function addEmployeeFamily()
    {
        $data['id'] = $this->request->getGet('id');
        $data['relations'] = $this->familyRelationModel->findAll();
        return view('visaTracking/employee/add_family', $data);
    }
    /**
     *Insert Family Details 
     */
    public function insertEmployeeFamily()
    {
        if($this->request->getPost(csrf_token()) === csrf_hash()) {
            $data['id'] = $this->request->getPost('id');
            $rules = array(
                'fname' => ['label' => 'First Name', 'rules' => 'required|alpha_space'],
                'lname' => ['label' => 'Last Name', 'rules' => 'required|alpha_space'],
                'dob' => ['label' => 'Date of Birth', 'rules' => 'required'],
                'mobile' => ['label' => 'Mobile', 'rules' => 'required|numeric|exact_length[10]|is_unique[employee_family.mobile]'],
                'relation_id' => ['label' => 'Relation', 'rules' => 'required'],
                'profession' => ['label' => 'Profession', 'rules' => 'required|alpha_numeric_space'],
                'nationality' => ['label' => 'Nationality', 'rules' => 'required|alpha_space'],
            );
            $check = $this->validate($rules);
            if($check == TRUE) {
                $add_family_details = array(
                    'employee_id' => $this->request->getPost('id'),
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'mobile' => $this->request->getPost('mobile'),
                    'dob' => date('Y-m-d', strtotime($this->request->getPost('dob'))),
                    'relation_id' => $this->request->getPost('relation_id'),
                    'profession' => $this->request->getPost('profession'),
                    'nationality' => $this->request->getPost('nationality'),
                    'created_at' => date('Y-m-d H:i'),
                    'created_by' => $this->session->get('user')['id'],
                );
                $insert_family_details = $this->employeeFamilyModel->insert($add_family_details);
                if($insert_family_details) {
                    return alert_success("Family Details Inserted Successfully");
                }else {
                    return alert_danger("Error in Inserting");
                }
            }else {
                $data['relations'] = $this->familyRelationModel->findAll();
                return view('visaTracking/employee/add_family', $data);
            }
        }
        else {
            return alert_danger("Error in Inserting..Please try again");
        }
    }
    /**
     * to View Employee Family Details By ID
     */ 
    public function viewEmployeeFamilyById()
    {
        $id = $this->request->getGet('id');
        $data['family_details'] = $this->employeeFamilyModel->where('employee_id', $id)->find();
        $data['tRecords'] = $this->employeeFamilyModel->where('employee_id', $id)->countAllResults();
        $family_relations = $this->familyRelationModel->findAll();
        foreach ($family_relations as $f_key => $relation) {
            $data['relations'][$relation['id']] = $relation;
        }
        return view('visaTracking/employee/employee_family', $data);
    }
    /**
     * To Edit Employee Family Details
     */ 
    public function editEmployeeFamily()
    {
        $id = $this->request->getGet('id');
        $data['relations'] = $this->familyRelationModel->findAll();
        $data['employee_family'] = $this->employeeFamilyModel->find($id);
        return view('visaTracking/employee/edit_family', $data);
    }

    /**
     * To Update Employee Family Details
     */ 
    public function updateEmployeeFamily()
    {
        if($this->request->getPost(csrf_token()) === csrf_hash()) {
            $data['id'] = $this->request->getPost('id');
            $data['employee_id'] = $this->request->getPost('employee_id');
            $data['relations'] = $this->familyRelationModel->findAll();
            $rules = array(
                'fname' => ['label' => 'First Name', 'rules' => 'required|alpha_space'],
                'lname' => ['label' => 'Last Name', 'rules' => 'required|alpha_space'],
                'dob' => ['label' => 'Date of Birth', 'rules' => 'required'],
                'mobile' => ['label' => 'Mobile', 'rules' => 'required|numeric|exact_length[10]|is_unique[employee_family.mobile,id,'.$this->request->getPost("id").']'],
                'relation_id' => ['label' => 'Relation', 'rules' => 'required'],
                'profession' => ['label' => 'Profession', 'rules' => 'required|alpha_numeric_space'],
                'nationality' => ['label' => 'Nationality', 'rules' => 'required|alpha_space'],
            );
            $check = $this->validate($rules);
            if($check == TRUE) {
                $edit_family_details = array(
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'mobile' => $this->request->getPost('mobile'),
                    'dob' => date('Y-m-d', strtotime($this->request->getPost('dob'))),
                    'relation_id' => $this->request->getPost('relation_id'),
                    'profession' => $this->request->getPost('profession'),
                    'nationality' => $this->request->getPost('nationality'),
                    'updated_at' => date('Y-m-d H:i'),
                    'updated_by' => $this->session->get('user')['id'],
                );
                $update_family_details = $this->employeeFamilyModel->update($data['id'], $edit_family_details);
                if($update_family_details) {
                    return alert_success("Family Details Updated Successfully");
                }else {
                    return alert_danger("Error in Updating");
                }
            }
            else {
                return view('visaTracking/employee/edit_family', $data);
            }
        }else {
            return alert_danger("Error in Updating!.Please try again");
        }
    }

    /**
     * Delete Employee Family 
     */ 
    public function deleteEmployeeFamily()
    {
        $id = $this->request->getPost('id');
        $delete_employee_family = $this->employeeFamilyModel->where('id', $id)->delete();
        if($delete_employee_family) {
            return alert_success('Family Member deleted Successfully');
        }else {
            return alert_danger('Error in Deleting!.. please try again');
        }
    }

}
?>