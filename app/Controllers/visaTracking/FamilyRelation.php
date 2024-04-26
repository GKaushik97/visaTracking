<?php

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * Family Relation
 */
class FamilyRelation extends BaseController
{
    protected $familyRelationModel;

    public function __construct()
    {
        $this->familyRelationModel = new \App\Models\visaTracking\FamilyRelationModel();
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

        $data["familyRelations"] = $this->familyRelationModel->orderBy("name", "asc")->findAll();
        $data["tRecords"] = $this->familyRelationModel->countAllResults();
        $data["page"] = [
            "title" => "Family Relation",
            "page_title" => "Family Relation Module",
            'js' => ['familyRelation'],
        ];

        return view("visaTracking/familyRelation/familyRelations", $data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data["params"] = $this->request->getPost();
        $data["tRecords"] = $this->familyRelationModel->like("name", $data["params"]["keywords"])->countAllResults();
        $data["familyRelations"] = $this->familyRelationModel->like("name", $data["params"]["keywords"])->orderBy("name", "asc")->findAll();
        
        return view("visaTracking/familyRelation/familyRelation_body", $data);
    }

    /**
     * Family Relation Add
     */
    public function add(): string 
    {
        return view("visaTracking/familyRelation/familyRelation_add");
    }

    /**
     * Family Relation Create
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
                $add_relation = $this->familyRelationModel->insert($create_relation);
                
                return view("template/alert_modal", ["msg" => "Relation Added Successfully!"]);
            } else {
                return view("visaTracking/familyRelation/familyRelation_add");
            }
        }
    }

    /**
     * To Edit Family Relation
     */
    public function edit(): string 
    {
        $id = $this->request->getGet("id");
        $data['familyRelation'] = $this->familyRelationModel->find($id);
        return view("visaTracking/familyRelation/familyRelation_edit",$data);
    }
    /**
     * To Update Family Relation
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
                $this->familyRelationModel->update($id,$update_relation);
                return view("template/alert_modal",["msg" => "Relation Updated Successfully!"]);
            } else {
                return view("visaTracking/familyRelation/familyRelation_edit",$data);
            }
        }
    }

    /**
     * To Delete Family Relation
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        if ($this->familyRelationModel->delete($id)) {
            return view("template/alert_modal", ["msg" => "Relation Deleted successfully!",]);
        }
    }
}
