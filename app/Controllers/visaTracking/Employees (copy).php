<?php
namespace app\Controllers\visaTracking;
use App\Controllers\BaseController;
use App\Libraries\phpmailer\phpmailer\src\PHPMailer;
use App\vendor\twilio\sdk\src\Twilio\Rest\Client;
/**
 * Employees Controller
 */
class Employees extends BaseController
{
    protected $employeeModel;
    protected $countryModel;
    protected $stateModel;
    protected $districtModel;
    protected $familyRelationModel;
    protected $employeeFamilyModel;
    protected $employeeEducationModel;
    protected $employeeexperienceModel;
    protected $visaTypeModel;
    protected $employeeVisaModel;
    protected $employeeDocumentModel;
    protected $educationalQualificationModel;
    protected $documentTypesModel;
    public function __construct()
    {
        $this->employeeModel = model('App\Models\visaTracking\EmployeeModel');
        $this->countryModel = model('App\Models\visaTracking\CountryModel');
        $this->stateModel = model('App\Models\visaTracking\StateModel');
        $this->districtModel = model('App\Models\visaTracking\DistrictModel');
        $this->educationalQualificationModel = model('App\Models\visaTracking\EducationalQualificationModel');
        $this->familyRelationModel = model('App\Models\visaTracking\FamilyRelationModel');
        $this->employeeFamilyModel = model('App\Models\visaTracking\EmployeeFamilyModel');
        $this->employeeEducationModel = model('App\Models\visaTracking\EmployeeEducationModel');
        $this->employeeexperienceModel = model('App\Models\visaTracking\EmployeeexperienceModel');
        $this->visaTypeModel = model('App\Models\visaTracking\VisaTypeModel');
        $this->employeeVisaModel = model('App\Models\visaTracking\EmployeeVisaModel');
        $this->employeeDocumentModel = model('App\Models\visaTracking\EmployeeDocumentModel');
        $this->documentTypesModel = model('App\Models\visaTracking\DocumentTypesModel');
    }

    public function index()
    {
        $data['params'] = array('keywords' => '', 'rows' => 10, 'sort_by' => 'employees.created_at', 'sort_order' => 'desc', 'page_no' => 1);
        if($this->request->getGet('emp_status') != "") {
            $data['params']['emp_status'] = $this->request->getGet('emp_status');
        }
        $today_date = date('Y-m-d');
        if($this->request->getGet('type') == "1" and $this->request->getGet('status') == "2") {
            $data['params']['expired'] = 0;
            $data['params']['from_date'] = date('Y-m-d', strtotime($today_date."+30 days"));
            $data['params']['to_date'] = date('Y-m-d', strtotime($data['params']['from_date']."+60 days"));
        }
        if($this->request->getGet('type') == "1" and $this->request->getGet('status') == "1") {
            $data['params']['expired'] = 0;
            $data['params']['from_date'] = date('Y-m-d', strtotime($today_date));
            $data['params']['to_date'] = date('Y-m-d', strtotime($data['params']['from_date']."+30 days"));
        }
        if($this->request->getGet('type') == "1" and $this->request->getGet('status') == "0") {
            $data['params']['expired'] = 1;
            $data['params']['from_date'] = date('Y-m-d', strtotime($today_date));
            $data['params']['to_date'] = date('Y-m-d', strtotime($data['params']['from_date']));
        }
        if($this->request->getGet('type') == "2" and $this->request->getGet('status') == "2") {
            $data['params']['expired'] = 0;
            $data['params']['start_date'] = date('Y-m-d', strtotime($today_date."+30 days"));
            $data['params']['end_date'] = date('Y-m-d', strtotime($data['params']['start_date']."+60 days"));
        }
        if($this->request->getGet('type') == "2" and $this->request->getGet('status') == "1") {
            $data['params']['expired'] = 0;
            $data['params']['start_date'] = date('Y-m-d', strtotime($today_date));
            $data['params']['end_date'] = date('Y-m-d', strtotime($data['params']['start_date']."+30 days"));
        }
        if($this->request->getGet('type') == "2" and $this->request->getGet('status') == "0") {
            $data['params']['expired'] = 1;
            $data['params']['start_date'] = date('Y-m-d', strtotime($today_date));
            $data['params']['end_date'] = date('Y-m-d', strtotime($data['params']['start_date']));
        }

        $data['employees'] = $this->employeeModel->getEmployees($data['params']);
        $data['tRecords'] = $this->employeeModel->getEmployeesCount($data['params']);
        $data['page'] = array(
			'page_title' => 'Employees',
			'title' => 'Employees',
            'js' => ['employee', 'empview', 'employeedocuments'],
		);
        return view('visaTracking/employee/employee', $data);
    }
    /**
     * Index Body Function
     */
    public function indexBody()
    {
        $data['params'] = $this->request->getPost();
        $data['employees'] = $this->employeeModel->getEmployees($data['params']);
        $data['tRecords'] = $this->employeeModel->getEmployeesCount($data['params']);
        return view("visaTracking/employee/employee_body", $data);
    }

    /**
     * Add Employee
     */
    public function addEmployee()
    {
        $data['passport_types'] = $this->employeeModel->getPassportTypes();
        $data['countries'] = $this->countryModel->findAll();
        $data['visa_types'] = $this->visaTypeModel->findAll();
        $data['edu_qualifications'] = $this->educationalQualificationModel->findAll();

        return view('visaTracking/employee/add_employee', $data);
    }

    /**
     * Get States By Country ID
     */ 
    public function getStatesByCountry()
    {
        $id = $this->request->getGet('country');
        $data['states'] = $this->stateModel->where('country_id', $id)->find();
        return view('visaTracking/employee/states_list', $data);
    }
    /**
     * Get Districts By State ID
     */ 
    public function getDistrictsByState() 
    {
        $id = $this->request->getGet('state');
        $data['districts'] = $this->districtModel->where('state_id', $id)->find();
        return view('visaTracking/employee/districts_list', $data);
    }

    /**
     * Insert Employee
     */
    public function insertEmployee()
    {
        if($this->request->getPost(csrf_token()) === csrf_hash()) 
        {
            $rules = array(
                'fname' => ['label' => 'First Name', 'rules' => 'required|trim|alpha_space'],
                'lname' => ['label' => 'Last Name', 'rules' => 'required|trim|alpha_space'],
                'gender' => ['label' => 'Gender', 'rules' => 'required|trim|'],
                'dob' => ['label' => 'Date of Birth', 'rules' => 'required|trim'],
                'mobile' => ['label' => 'Mobile', 'rules' => 'required|trim|numeric|exact_length[10]|is_unique[employees.mobile]'],
                'alt_mobile' => ['label' => 'Alternate Mobile', 'rules' => 'permit_empty|trim|numeric|exact_length[10]|is_unique[employees.alt_mobile]'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email|trim|is_unique[employees.email]'],
                'pob' => ['label' => 'Place of Birth', 'rules' => 'required'],
                'passport_no' => ['label' => 'passport Number', 'rules' => 'required|trim|alpha_numeric|exact_length[8]|is_unique[employees.passport_no]|trim'],
                'passport_type' => ['label' => 'Passport Type', 'rules' => 'required|trim'],
                'pid' => ['label' => 'Issue Date', 'rules' => 'required'],
                'ped' => ['label' => 'Password Expiry Date', 'rules' => 'required'],
                'place_of_issue' => ['label' => 'Place of Issue', 'rules' => 'required|alpha_space'],
                'address1' => ['label' => 'Address', 'rules' =>'required|regex_match[/^[A-Za-z0-9\-\s\,._()\/]+$/]'],
                'address2' => ['label' => 'Address', 'rules' =>'required|regex_match[/^[A-Za-z0-9\-\s\,._()\/]+$/]'],
                'city' => ['label' => 'City', 'rules' =>'required|alpha_space'],
                'country' => ['label' => 'Country', 'rules' =>'required'],
                'state' => ['label' => 'State', 'rules' =>'required'],
                'district' => ['label' => 'District', 'rules' =>'required'],
                'pincode' => ['label' => 'Pincode', 'rules' =>'required|alpha_numeric'],
                'nationality' => ['label' => 'Nationality', 'rules' =>'required|alpha'],
                'marital_status' => ['label' => 'Marital Status', 'rules' =>'required'],
                'employee' => ['label' => 'Employee Experience', 'rules' => 'required'],
                'photo' =>[
                    'rules'=>['uploaded[photo]', 'ext_in[photo,png,jpg,jpeg,pdf,doc,docx]', 'max_size[photo,20480]'],
                ],
                'visa_no' => ['label' => 'Visa No.', 'rules' => 'required|trim|alpha_numeric|is_unique[employee_visa.visa_no]'],
                'visa_type' => ['label' => 'Visa Type', 'rules' => 'required|trim'],
                'applied_date' => ['label' => 'Applied Date', 'rules' => 'required|trim'],
                'issued_date' => ['label' => 'Issued Date', 'rules' => 'required|trim'],
                'start_date' => ['label' => 'Start Date', 'rules' => 'required|trim'],
                'end_date' => ['label' => 'End Date', 'rules' => 'required|trim'],
                'duration' => ['label' => 'Duration', 'rules' => 'required|numeric|trim'],
                'purpose' => ['label' => 'Purpose', 'rules' => 'required|trim'],
                'address' => ['label' => 'Address', 'rules' => 'required|trim'],
                'place_of_issue1' => ['label' => 'Place of Issue', 'rules' => 'required|trim'],
                'edu_qualification' => ['label' => 'Education Qualification', 'rules' => 'required'],
            );
            if($this->request->getPost('employee') == "1") {
                $rules['emp_experience'] = array('label' => 'Employee Experience', 'rules' =>'required');
            }
            $check = $this->validate($rules);
            if($check == TRUE) {
                $file_upload = $this->request->getFile('photo');
                if($file_upload->isValid()) {
                    $fileName = $file_upload->getRandomName();
                    $file_upload->move(DOCUMENTROOT . "employee_images/", $fileName);
                }
                if($this->request->getPost('employee') == "1") {
                    $emp_exp = $this->request->getPost('emp_experience');
                }
                else {
                    $emp_exp = 0;
                }
                $create_employee = array(
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'gender' => $this->request->getPost('gender'),
                    'dob' => date('Y-m-d',strtotime($this->request->getPost('dob'))),
                    'mobile' => $this->request->getPost('mobile'),
                    'alt_mobile' => $this->request->getPost('alt_mobile') ? $this->request->getPost('alt_mobile') : '',
                    'email' => $this->request->getPost('email'),
                    'place_of_birth' => $this->request->getPost('pob'),
                    'passport_no' => $this->request->getPost('passport_no'),
                    'passport_type' => $this->request->getPost('passport_type'),
                    'passport_issued_date' => date('Y-m-d',strtotime($this->request->getPost('pid'))),
                    'passport_expiry_date' => date('Y-m-d',strtotime($this->request->getPost('ped'))),
                    'place_of_issue' => $this->request->getPost('place_of_issue'),
                    'address1' => $this->request->getPost('address1'),
                    'address2' => $this->request->getPost('address2'),
                    'city' => $this->request->getPost('city'),
                    'district' => $this->request->getPost('district'),
                    'state' => $this->request->getPost('state'),
                    'country' => $this->request->getPost('country'),
                    'pincode' => $this->request->getPost('pincode'),
                    'nationality' => $this->request->getPost('nationality'),
                    'marital_status' => $this->request->getPost('marital_status'),
                    'photo' => $fileName,
                    'emp_experience' => $emp_exp,
                    'edu_qualification' => $this->request->getPost('edu_qualification'),
                    'employee_status' => 1,
                    'created_at' => date('Y-m-d H:i'),
                    'created_by' => $this->session->get('user')['id'],
                );
                $this->employeeModel->insert($create_employee);
                $employee_id = $this->employeeModel->getInsertID();
                $employee_code = "ME".str_pad($employee_id, 5,'0',STR_PAD_LEFT);

                $update_emp_code = array(
                    'id' => $employee_id,
                    'code' => $employee_code,
                );
                $add_visa_details = array(
                    'employee_id' => $employee_id,
                    'visa_no' => $this->request->getPost('visa_no'),
                    'visa_type' => $this->request->getPost('visa_type'),
                    'applied_date' => date('Y-m-d',strtotime($this->request->getPost('applied_date'))),
                    'issued_date' => date('Y-m-d',strtotime($this->request->getPost('issued_date'))),
                    'start_date' => date('Y-m-d',strtotime($this->request->getPost('start_date'))),
                    'end_date' => date('Y-m-d',strtotime($this->request->getPost('end_date'))),
                    'duration' => $this->request->getPost('duration'),
                    'purpose' => $this->request->getPost('purpose'),
                    'address' => $this->request->getPost('address'),
                    'place_of_issue' => $this->request->getPost('place_of_issue1'),
                    'created_at' => date('Y-m-d H:i'),
                    'created_by' => $this->session->get('user')['id'],
                );
                $this->employeeVisaModel->insert($add_visa_details);
                if($this->employeeModel->update($employee_id, $update_emp_code)){
                    $alert = array('color' => 'success', 'msg' => 'Employee added Successfully');
                }else {
                    $alert = array('color' => 'danger', 'msg' => 'Error in Inserting!');
                }
                // print "<pre>"; print_r($create_employee); print "</pre>";exit;
            }else {
                $data['passport_types'] = $this->employeeModel->getPassportTypes();
                $data['countries'] = $this->countryModel->findAll();
                $data['edu_qualifications'] = $this->educationalQualificationModel->findAll();
                if($this->request->getPost('country')) {
                    $data['states'] = $this->stateModel->where('country_id', $this->request->getPost('country'))->find();
                }
                if($this->request->getPost('state')) {
                    $data['districts'] = $this->districtModel->where('state_id', $this->request->getPost('state'))->find();
                }
                $data['visa_types'] = $this->visaTypeModel->findAll();
                return view('visaTracking/employee/add_employee', $data);
            }
        }else {
            $alert = array('color' => 'danger', 'msg' => "Error in Inserting!!Please Try Again");
        }
        return view('template/alert_modal', $alert);
    }
    
    /**
     * Edit Employee
     */
    public function editEmployee()
    {
        $id = $this->request->getGet('id');
        $data['employee'] = $this->employeeModel->find($id);
        // print "<pre>"; print_r($data['employee']); print "</pre>";
        $data['passport_types'] = $this->employeeModel->getPassportTypes();
        $data['countries'] = $this->countryModel->findAll();
        $data['states'] = $this->stateModel->where('country_id', $data['employee']['country'])->findAll();
        $data['districts'] = $this->districtModel->where('state_id', $data['employee']['state'])->findAll();
        $data['employee_visa'] = $this->employeeVisaModel->where('employee_id', $id)->find();
        $data['family_details'] = $this->employeeFamilyModel->where('employee_id', $id)->find();
        $data['edu_qualifications'] = $this->educationalQualificationModel->findAll();

        $family_relations = $this->familyRelationModel->findAll();
        foreach ($family_relations as $f_key => $relation) {
            $data['relations'][$relation['id']] = $relation;
        }
        $data['visa_types'] = $this->visaTypeModel->findAll();
        return view('visaTracking/employee/edit_employee', $data);
    }

    /**
     * Get States By Country
     */ 
    public function editStatesByCountry()
    {
        $id = $this->request->getGet('country');
        $data['states'] = $this->stateModel->where('country_id', $id)->find();
        return view('visaTracking/employee/edit_states', $data);
    }
    /**
     * Get Districts By State
     */ 
    public function editDistrictsByState()
    {
        $id = $this->request->getGet('state');
        $data['districts'] = $this->districtModel->where('state_id', $id)->find();
        return view('visaTracking/employee/edit_districts_list', $data);
    }

    /**
     * Update Employee
     */ 
    public function updateEmployee()
    {
        if($this->request->getPost(csrf_token()) === csrf_hash()) 
        {
            $data['id'] = $this->request->getPost('id');
            $data['visa_id'] = $this->request->getPost('visa_id');
            $family_details = $this->employeeFamilyModel->where('employee_id', $data['id'])->find();
            
            $rules = array(
                'fname' => ['label' => 'First Name', 'rules' => 'required|alpha_space'],
                'lname' => ['label' => 'Last Name', 'rules' => 'required|alpha_space'],
                'gender' => ['label' => 'Gender', 'rules' => 'required'],
                'dob' => ['label' => 'Date of Birth', 'rules' => 'required'],
                'mobile' => ['label' => 'Mobile', 'rules' => 'required|numeric|exact_length[10]|is_unique[employees.mobile,id,'.$this->request->getPost("id").']'],
                'alt_mobile' => ['label' => 'Alternate Mobile', 'rules' => 'permit_empty|numeric|exact_length[10]|is_unique[employees.alt_mobile,id,'.$this->request->getPost("id").']'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email|is_unique[employees.email,id,'.$this->request->getPost("id").']'],
                'pob' => ['label' => 'Place of Birth', 'rules' => 'required'],
                'passport_no' => ['label' => 'passport Number', 'rules' => 'required|alpha_numeric|is_unique[employees.passport_no,id,'.$this->request->getPost("id").']'],
                'passport_type' => ['label' => 'Passport Type', 'rules' => 'required'],
                'pid' => ['label' => 'Issue Date', 'rules' => 'required'],
                'ped' => ['label' => 'Password Expiry Date', 'rules' => 'required'],
                'place_of_issue' => ['label' => 'Place of Issue', 'rules' => 'required|alpha_space'],
                'address1' => ['label' => 'Address', 'rules' =>'required|regex_match[/^[A-Za-z0-9\-\s\,._()\/]+$/]'],
                'address2' => ['label' => 'Address', 'rules' =>'required|regex_match[/^[A-Za-z0-9\-\s\,._()\/]+$/]'],
                'city' => ['label' => 'City', 'rules' =>'required|alpha_space'],
                'country' => ['label' => 'Country', 'rules' =>'required'],
                'state' => ['label' => 'State', 'rules' =>'required'],
                'district' => ['label' => 'District', 'rules' =>'required'],
                'pincode' => ['label' => 'Pincode', 'rules' =>'required|alpha_numeric'],
                'nationality' => ['label' => 'Nationality', 'rules' =>'required|alpha'],
                'marital_status' => ['label' => 'Marital Status', 'rules' =>'required'],
                'employee' => ['label' => 'Employee Experience', 'rules' => 'required'],
                'visa_no' => ['label' => 'Visa No.', 'rules' => 'required|trim|alpha_numeric|is_unique[employee_visa.visa_no,id,'.$this->request->getPost("visa_id").']'],
                'visa_type' => ['label' => 'Visa Type', 'rules' => 'required|trim'],
                'applied_date' => ['label' => 'Applied Date', 'rules' => 'required|trim'],
                'issued_date' => ['label' => 'Issued Date', 'rules' => 'required|trim'],
                'start_date' => ['label' => 'Start Date', 'rules' => 'required|trim'],
                'end_date' => ['label' => 'End Date', 'rules' => 'required|trim'],
                'duration' => ['label' => 'Duration', 'rules' => 'required|numeric|trim'],
                'purpose' => ['label' => 'Purpose', 'rules' => 'required|trim'],
                'address' => ['label' => 'Address', 'rules' => 'required|trim'],
                'place_of_issue1' => ['label' => 'Place of Issue', 'rules' => 'required|trim'],
                'edu_qualification' => ['label' => 'Education Qualification', 'rules' => 'required'],
            );
            if(!empty($family_details)) {
                $rules['emergency_id'] = array('label' => 'Emergency Contact', 'rules' => 'required');
            }
            if($this->request->getPost('employee') == "1") {
                $rules['emp_experience'] = array('label' => 'Employee Experience', 'rules' =>'required');
            }
            $check = $this->validate($rules);
            if($check == TRUE) {
                $employee_info = $this->employeeModel->find($data['id']);
                $file_upload = $this->request->getFile('photo');
                if($file_upload->isValid()) {
                    $employee_photo = DOCUMENTROOT."employee_images/".$employee_info['photo'];
                    if(file_exists($employee_photo) and !is_dir($employee_photo)) {
                        unlink($employee_photo);
                    }
                    $fileName = $file_upload->getRandomName();
                    $file_upload->move(DOCUMENTROOT . "employee_images/", $fileName);
                }else {
                    $fileName = $employee_info['photo'];
                }
                if($this->request->getPost('employee') == "1") {
                    $emp_exp = $this->request->getPost('emp_experience');
                }
                else {
                    $emp_exp = 0;
                }
                $edit_employee = array(
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'gender' => $this->request->getPost('gender'),
                    'dob' => date('Y-m-d',strtotime($this->request->getPost('dob'))),
                    'mobile' => $this->request->getPost('mobile'),
                    'alt_mobile' => $this->request->getPost('alt_mobile') ? $this->request->getPost('alt_mobile') : '',
                    'email' => $this->request->getPost('email'),
                    'place_of_birth' => $this->request->getPost('pob'),
                    'passport_no' => $this->request->getPost('passport_no'),
                    'passport_type' => $this->request->getPost('passport_type'),
                    'passport_issued_date' => date('Y-m-d',strtotime($this->request->getPost('pid'))),
                    'passport_expiry_date' => date('Y-m-d',strtotime($this->request->getPost('ped'))),
                    'place_of_issue' => $this->request->getPost('place_of_issue'),
                    'address1' => $this->request->getPost('address1'),
                    'address2' => $this->request->getPost('address2'),
                    'city' => $this->request->getPost('city'),
                    'district' => $this->request->getPost('district'),
                    'state' => $this->request->getPost('state'),
                    'country' => $this->request->getPost('country'),
                    'pincode' => $this->request->getPost('pincode'),
                    'nationality' => $this->request->getPost('nationality'),
                    'marital_status' => $this->request->getPost('marital_status'),
                    'photo' => $fileName,
                    'emergency_id' => $this->request->getPost('emergency_id') ?? '',
                    'emp_experience' => $emp_exp,
                    'employee_status' => $this->request->getPost('employee_status'),
                    'edu_qualification' => $this->request->getPost('edu_qualification'),
                    'updated_at' => date('Y-m-d H:i'),
                    'updated_by' => $this->session->get('user')['id'],
                );
                // print "<pre>"; print_r($edit_employee); print "</pre>";exit;
                $edit_visa_details = array(
                    'visa_no' => $this->request->getPost('visa_no'),
                    'visa_type' => $this->request->getPost('visa_type'),
                    'applied_date' => date('Y-m-d',strtotime($this->request->getPost('applied_date'))),
                    'issued_date' => date('Y-m-d',strtotime($this->request->getPost('issued_date'))),
                    'start_date' => date('Y-m-d',strtotime($this->request->getPost('start_date'))),
                    'end_date' => date('Y-m-d',strtotime($this->request->getPost('end_date'))),
                    'duration' => $this->request->getPost('duration'),
                    'purpose' => $this->request->getPost('purpose'),
                    'address' => $this->request->getPost('address'),
                    'place_of_issue' => $this->request->getPost('place_of_issue1'),
                    'updated_at' => date('Y-m-d H:i'),
                    'updated_by' => $this->session->get('user')['id'],
                );
                
                $this->employeeVisaModel->update($data['visa_id'], $edit_visa_details);
                $update_employee = $this->employeeModel->update($data['id'],$edit_employee);
                $subject = "Employee Email Configuration";
                $body = "This is Employee Details with passport info and address info.";
                $mail = new PHPMailer();
                $mail->SetFrom('gudakaushik@gmail.com', 'Kaushik');
                $mail->AddAddress('gudakaushik@gmail.com', 'Guda Kaushik');
                $mail->AddBCC('gudakarthik@2000.com','Karthik');
                $mail->Encoding = "base64";
                $mail->Subject = $subject;
                $mail->MsgHTML($body);
                $mail->send();
                if($update_employee){
                    /*$message_sms = array(
                        'username' => $this->request->getPost('fname')." ".$this->request->getPost('lname'),
                        'password' => '12345678',
                        'sender_id' => $this->request->getPost('pincode'),
                        'mobile' => $this->request->getPost('mobile'),
                        'message' => $this->request->getPost('email'),
                    );
                    $this->send_sms($message_sms);*/
                    $alert = array('color' => 'success', 'msg' => 'Employee Updated Successfully');
                }else {
                    $alert = array('color' => 'danger', 'msg' => 'Error in Updating!');
                }
            }else {
                $data['passport_types'] = $this->employeeModel->getPassportTypes();
                $data['countries'] = $this->countryModel->findAll();
                $data['edu_qualifications'] = $this->educationalQualificationModel->findAll();
                if($this->request->getPost('country')) {
                    $data['states'] = $this->stateModel->where('country_id', $this->request->getPost('country'))->find();
                }
                if($this->request->getPost('state')) {
                    $data['districts'] = $this->districtModel->where('state_id', $this->request->getPost('state'))->find();
                }
                $data['visa_types'] = $this->visaTypeModel->findAll();
                $data['family_details'] = $this->employeeFamilyModel->where('employee_id', $data['id'])->find();
                $family_relations = $this->familyRelationModel->findAll();
                foreach ($family_relations as $f_key => $relation) {
                    $data['relations'][$relation['id']] = $relation;
                }
                return view('visaTracking/employee/edit_employee', $data);
            }
        }else {
            $alert = array('color' => 'danger', 'msg' => "Error in Updating!!Please Try Again");
        }
        return view('template/alert_modal', $alert);
    }
    public function send_sms($array)
    {   
        $postData = array(
            'username' => $array['username'],
            'pass' =>$array['password'],
            'senderid' => $array['sender_id'],
            'dest_mobileno' => $array['mobile'],
            'message'=> $array['message'],
            'response' => 'Y',
        );
        
        $url = "www.smsjust.com/blank/sms/user/urlsms.php";
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            curl_close($ch);
            return FALSE;
        }
        curl_close($ch);
        return $output;  
    }

    /**
     * To Delete Employee
     */ 
    public function deleteEmployee()
    {
        $id = $this->request->getPost('id');
        $employee_file = $this->employeeModel->find($id);
        $employee_doc = $this->employeeDocumentModel->where('employee_id', $id)->find();
        if(isset($employee_doc) and !empty($employee_doc)) {
            foreach($employee_doc as $doc_id => $doc_val) {
                if(isset($doc_val['file']) and !empty($doc_val['file'])) {
                    $emp_doc = DOCUMENTROOT."employee_images/".$doc_val['file'];
                    if(file_exists($emp_doc) and !is_dir($emp_doc)) {
                        unlink($emp_doc);
                    }
                }
            }
        }
        if(isset($employee_file['photo']) and !empty($employee_file['photo'])) {
            $emp_folder = DOCUMENTROOT."employee_images/".$employee_file['photo'];
            if(file_exists($emp_folder) and !is_dir($emp_folder)) {
                unlink($emp_folder);
            }
        }
        $this->employeeDocumentModel->where('employee_id', $id)->delete();
        $this->employeeVisaModel->where('employee_id', $id)->delete();
        $this->employeeFamilyModel->where('employee_id', $id)->delete();
        $this->employeeexperienceModel->where('employee_id', $id)->delete();
        $this->employeeEducationModel->where('employee_id', $id)->delete();
        if($this->employeeModel->where('id', $id)->delete()){
            $alert = array("color" => "success", "msg" => "Employee Deleted Successfully");
        }else {
            $alert = array("color" => "danger", "msg" => "Error in deleting!");
        }
        return view('template/alert_modal', $alert);
    }
    /**
     * View Employee
     */
    public function viewEmployee()
    {
        $id = $this->request->getGet('id');
        $data['tab_id'] = $this->request->getGet('tab') ? $this->request->getGet('tab') : 1; // Active tab on view
        // Employee Document Details
        $data['employee_documents'] = $this->employeeDocumentModel->where('employee_id', $id)->find();
        $data['doc_tRecords'] = $this->employeeDocumentModel->where('employee_id', $id)->countAllResults();
        // Employee Family Details
        $data['family_details'] = $this->employeeFamilyModel->where('employee_id', $id)->find();
        $data['tRecords'] = $this->employeeFamilyModel->where('employee_id', $id)->countAllResults();
        // Employee Education Details
        $data['education_details'] = $this->employeeEducationModel->where('employee_id', $id)->find();
        $data['education_count'] = $this->employeeEducationModel->where('employee_id', $id)->countAllResults();
        // Employee Experience Details
        $data['emp_exp_details'] = $this->employeeexperienceModel->where('employee_id', $id)->orderBy('current_organisation','desc')->find();
        $data['emp_exp_count'] = $this->employeeexperienceModel->where('employee_id', $id)->countAllResults();
        // Visa Details
        $emp_visa_details = $this->employeeVisaModel->where('employee_id', $id)->find();
        foreach($emp_visa_details as $v_k => $emp_visa) {
            $data['visa_details'][$emp_visa['employee_id']] = $emp_visa;
        }
        // Visa Types
        $visa_type_ext = $this->visaTypeModel->findAll();
        foreach($visa_type_ext as $v1_k => $visa_type_val) {
            $data['visa_types'][$visa_type_val['id']] = $visa_type_val; 
        }
        // print "<pre>"; print_r($data['visa_details']); print "</pre>";
        $passport_types = $this->employeeModel->getPassportTypes();
        foreach($passport_types as $p_key => $pt_val) {
            $data['passport_type'][$pt_val['id']] = $pt_val;
        }
        $countries_val = $this->countryModel->findAll();
        foreach($countries_val as $c_k => $c_val) {
            $data['countries'][$c_val['id']] = $c_val;
        }
        $states_val = $this->stateModel->findAll();
        foreach($states_val as $s_key => $s_val) {
            $data['states'][$s_val['id']] = $s_val; 
        }
        $districts_val = $this->districtModel->findAll();
        foreach($districts_val as $d_key => $d_val) {
            $data['districts'][$d_val['id']] = $d_val;
        }
        $family_relations = $this->familyRelationModel->findAll();
        foreach ($family_relations as $f_key => $relation) {
            $data['relations'][$relation['id']] = $relation;
        }
        $educationalQualification = $this->educationalQualificationModel->findAll();
        foreach ($educationalQualification as $edu_qualification ){
            $data['educationalQualification'][$edu_qualification['id']] = $edu_qualification;
        }
        $documentTypes = $this->documentTypesModel->findAll();
        foreach ($documentTypes as $documentType ){
            $data['documentTypes'][$documentType['id']] = $documentType;
        }
        // Employee Details
        $data['employee'] = $this->employeeModel->find($id);
        $data['emergency_details'] = $this->employeeModel->getEmergencyContactDetails($id);
        // print "<pre>"; print_r($data['employee']); print "</pre>";
        return view('visaTracking/employee/view_employee', $data);
    }

    /**
     * Load Employee Modal Cols
     */ 
    public function getEmployeeCols()
    {
        $data['params'] = $this->request->getGet();
        return view('visaTracking/employee/export_modal', $data);
    }

    /**
     * Get Employee Export
     */ 
    public function employeesExportXls($i)
    {
        header("Content-type: application/vnd.ms-excel;");
        header("Content-Disposition: attachment;filename= EmployeeDetails-".$i.".xls ");

        $data['columns'] = $this->request->getPost('rights');
        $data['params'] = json_decode($this->request->getPost('params'), TRUE);

        //xls consumers headings and sql query select preparation
        $cols = "";
        $excel_data = "<table><thead><tr>";
        $excel_data.= '<th>CODE</th>';
        if (isset($_POST['rights']) and !empty($_POST['rights'])) {
            foreach ($this->request->getPost('rights') as $key => $value) {
                $excel_data.= '<th>'.ucwords(str_replace("_", " ", $key)).'</th>';
                //mysql select columns list
                switch ($key) {
                    case 'gender':
                        $cols .= ",( CASE employees.gender
                                WHEN '1' THEN 'Male'
                                WHEN '2' THEN 'Female'
                                WHEN '0' THEN 'Other'
                            END ) as gender";
                    break;
                    case 'marital_status':
                        $cols .= ",( CASE employees.marital_status
                                WHEN '1' THEN 'Married'
                                WHEN '2' THEN 'Unmarried'
                            END ) as marital_status";
                    break;
                    case 'contact_name' : $cols .=",CONCAT_WS('', ef.fname, ef.lname) as contact_name";break;
                    case 'contact_no' : $cols .=",ef.mobile as contact_no";break;
                    case 'contact_relation' : $cols .=",fr.name as contact_relation";break;
                    case 'district' : $cols .=",d.name as district";break;
                    case 'state' : $cols .=",s.name as state";break;
                    case 'country' : $cols .=",c.name as country";break;
                    default: $cols .= ', employees.'.$key; break;
                }
            }
        }
        $data['cols'] = trim($cols,",");
        $excel_data .= "</tr></thead><tbody>";
        $employees = $this->employeeModel->getEmployeesExoprt($data['params'], $data['cols'],$i);
        if (!empty($employees)) {
            foreach ($employees as $index => $employee) {
                $excel_data .= "<tr>";
                foreach ($employee as $index1 => $value) {
                    if($index1 == 'dob' OR $index1 == 'passport_issued_date' OR $index1 == 'passport_expiry_date') {
                        $excel_data.= "<td>".displayDate($value)."</td>";
                    }else {
                        $excel_data.= "<td>".$value."</td>";
                    }
                }
                $excel_data.="</tr>";
            }
        }
        $excel_data.="</tbody></table>";
        print $excel_data;
    }

    public function getExportCsv()  
    {        
        // Set headers for CSV
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=excel_export.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        $headers = ['Code','First Name', 'Last Name', 'Gender'];
        // Open the output stream
        $file = fopen("php://output", "w");
        fputcsv($file, $headers);
        $employee_details = array(array('123','ram','gd','male'),array('345','Satya','Srinu','Male'));
        // Write the data to the CSV
        foreach ($employee_details as $details) {
            fputcsv($file, $details, "\t"); // Tab-separated
        }
        // Close the output stream
        fclose($file);
        exit;
    }
}
?>