<?php

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * Employee Documents 
 */
class EmployeeDocuments extends BaseController 
{
	protected $employeedocumentmodel;
	protected $documentTypesModel;

	public function __construct()
	{
		$this->employeedocumentmodel = model('App\Models\visaTracking\EmployeeDocumentModel');
        $this->documentTypesModel = model('App\Models\visaTracking\DocumentTypesModel');
	}

	/**
	 * index method
	 */
	public function index(): string
	{
		$data['params'] = array(
			'keywords' => '',
		);
		$data['employee_document'] = $this->employeedocumentmodel->orderBy('file','asc')->findAll();
		$data['total_records'] = $this->employeedocumentmodel->CountAllResults();

		$data['page'] = [
			'title' => 'EmployeeDocuments',
			'page_title' => 'EmployeeDocuments Module',
			'js' => ['employeedocuments'],
		];
		return view('visaTracking/employeeDocuments/employee_documents',$data);
	}

	/**
	 * index Body
	 */
	public function indexBody(): string 
	{
		$data['params'] = $this->request->getPost();
		$data['total_records'] = $this->employeedocumentmodel->like('file',$data['params']['keywords'])->CountAllResults();
		$data['employee_document'] = $this->employeedocumentmodel->like('file',$data['params']['keywords'])->orderBy('file','asc')->findAll();

		return view('visaTracking/employeeDocuments/employee_documents_body',$data);

	}
	/**
	 * add EmployeeDocument
	 */
	public function add(): string 
	{
		$data['employee_id'] = $this->request->getPost('id');
		$data['document'] = $this->documentTypesModel->findAll();
		return view('visaTracking/employeeDocuments/adddocuments',$data);


	}
	/**
	 * insert EmployeeDocument
	 */
	public function create(): string
{
	// print "<pre>"; print_r($_POST); print "</pre>";exit;
    // Check CSRF token
    if ($this->request->getPost(csrf_token()) == csrf_hash()) {
        $rules = [
            'file' => ['label' => 'File', 'rules' => 'uploaded[file]|max_size[file,20480]'],
            'document_type_id' => ['label' => 'Document', 'rules' => 'required'],
        ];
        
        // Validate the request
        if ($this->validate($rules)) {
            $file_upload = $this->request->getFile('file');
            if ($file_upload->isValid()) {
                $fileName = $file_upload->getRandomName();
                $file_upload->move(DOCUMENTROOT . "employee_images/", $fileName);
                $create_docu = [
                	'employee_id' => $this->request->getPost('employee_id'),
                    'file' => $fileName,
                    'document_type_id' => $this->request->getPost('document_type_id'),
                ];                
                if ($this->employeedocumentmodel->insert($create_docu)) {
                	return alert_success("Employee Addedd Successfully");
                } else {
                	return alert_danger("Error in Inserting!");
                }
            } else {
                return alert_danger("Error in Inserting!");
            }
        } else {
            // if validation fails, return to the add documents view with validation errors
            $data['employee_id'] = $this->request->getPost('employee_id');
            $data['document'] = $this->documentTypesModel->findAll();
            return view('visaTracking/employeeDocuments/adddocuments', $data);
        }
    } else {
        return alert_danger("Error in Inserting!");
    }
    return view('template/alert_modal', $alert);
}
	/**
	 * view EmployeeDocuments
	 */
	public function viewDocuments()
    {
        $id = $this->request->getGet('id');
        $documentTypes = $this->documentTypesModel->findAll();
        foreach ($documentTypes as $documentType ){
            $data['documentTypes'][$documentType['id']] = $documentType;
        }
        $data['doc_tRecords'] = $this->employeedocumentmodel->where('employee_id', $id)->countAllResults();
        // EmployeeDocument Details
        $data['employee_documents'] = $this->employeedocumentmodel->where('employee_id', $id)->find();
     
        return view('visaTracking/employee/employee_document', $data);
    }

    /**
     * Delete Document
     */ 
    public function deleteDocument()
    {
    	$id = $this->request->getPost('id');
    	$doc_details = $this->employeedocumentmodel->find($id);
    	if($doc_details['file']) {
    		$doc_file = DOCUMENTROOT."employee_images/".$doc_details['file'];
    		if(file_exists($doc_file) and !is_dir($doc_file)) {
    			unlink($doc_file);
    		}
    	}
    	if($this->employeedocumentmodel->delete($id)) {
    		return alert_success("Document Deleted Successfully");
    	}else {
    		return alert_danger("Error in Deleting!");
    	}
    }

}