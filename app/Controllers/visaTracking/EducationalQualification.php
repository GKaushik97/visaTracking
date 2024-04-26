<?php

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * Education Qualification
 */
class EducationalQualification extends BaseController
{
    protected $educationalQualificationModel;

    public function __construct()
    {
        $this->educationalQualificationModel = model('App\Models\visaTracking\EducationalQualificationModel');
    }

    /**
     * Index Method
     */
    public function index(): string
    {
        $data["params"] = [
            "rows" => "10",
            "pageno" => "1",
            "sort_by" => "name",
            "sort_order" => "asc",
            "keywords" => "",
        ];

        $data["educationalQualifications"] = $this->educationalQualificationModel->orderBy("name", "asc")->findAll();
        $data["tRecords"] = $this->educationalQualificationModel->countAllResults();
        $data["page"] = [
            "title" => "Education Qualification",
            "page_title" => "Educational Qualification Module",
            'js' => ['educationalQualification'],
        ];

        return view("visaTracking/educationalQualification/educationalQualifications", $data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data["params"] = $this->request->getPost();
        $data["tRecords"] = $this->educationalQualificationModel->like("name", $data["params"]["keywords"])->countAllResults();
        $data["educationalQualifications"] = $this->educationalQualificationModel->like("name", $data["params"]["keywords"])->orderBy("name", "asc")->findAll();
        
        return view("visaTracking/educationalQualification/educationalQualification_body", $data);
    }

    /**
     * Education Qualification Add
     */
    public function add(): string 
    {
        return view("visaTracking/educationalQualification/educationQualification_add");
    }

    /**
     * Education Qualification Create
     */
    public function create(): string 
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = [
                "name" => ["label" => "Name", "rules" => "required"],
            ];
            if ($this->validate($rules)) {
                $create_relation = [
                    "name" => $this->request->getPost("name"),
                ];
                $add_relation = $this->educationalQualificationModel->insert($create_relation);
                
                return view("template/alert_modal", ["msg" => "Qualification Added Successfully!"]);
            } else {
                return view("visaTracking/educationalQualification/educationQualification_add");
            }
        }
    }

    /**
     * To Edit Education Qualification
     */
    public function edit(): string 
    {
        $id = $this->request->getGet("id");
        $data['educationalQualification'] = $this->educationalQualificationModel->find($id);
        return view("visaTracking/educationalQualification/educationalQualification_edit",$data);
    }
    /**
     * To Update Education Qualification
     */
    public function update(): string 
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $id = $this->request->getPost("id");
            $rules = array(
                "name" => ["label" => "Name","rules" => "required"],
            );
            if($this->validate($rules)){
                $update_relation = array(
                    "name" => $this->request->getPost("name"),
                );
                $this->educationalQualificationModel->update($id,$update_relation);
                return view("template/alert_modal",["msg" => "Qualification Updated Successfully!"]);
            } else {
                return view("visaTracking/educationalQualification/educationQualification_edit",$data);
            }
        }
    }

    /**
     * To Delete Education Qualification
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        if ($this->educationalQualificationModel->delete($id)) {
            return view("template/alert_modal", ["msg" => "Qualification Deleted successfully!",]);
        }
    }
}
