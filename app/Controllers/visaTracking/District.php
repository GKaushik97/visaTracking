<?php

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * District
 */
class District extends BaseController
{
    protected $districtModel;
    protected $stateModel;
    public function __construct()
    {
        $this->stateModel = model('App\Models\visaTracking\StateModel');
        $this->districtModel = model('App\Models\visaTracking\DistrictModel');
    }

    /**
     * Index Method
     */
    public function index(): string
    {
        $data["params"] = [
            "rows" => "50",
            "pageno" => "1",
            "sort_by" => "name",
            "sort_order" => "asc",
            "keywords" => "",
        ];
        $data["state"] = $this->stateModel->findAll();
        // $data["district"] = $this->districtModel->findAll();
        $data['params']["tRecords"] = $this->districtModel->countAllDistricts($data['params']);
        // print_r($data['state']); exit;
        $data["district"] = $this->districtModel->getAllDistricts($data['params']);
        $data["page"] = [
            "title" => "District",
            "page_title" => "Districts Module",
            "js" => ["district"],
        ];

        return view("visaTracking/district/district", $data);
    }

        
    /**
    * Index Body Method
    */
    public function indexBody(): string
    {
        $data['params'] = $this->request->getPost();
        $keywords = $data['params']["keywords"];
        $stateId = $data['params']["state_id"];
        $data['params']["tRecords"] = $this->districtModel->countAllDistricts($data['params']);

        $data["district"] = $this->districtModel->getAllDistricts($data['params']);

        $data["state"] = $this->stateModel->findAll();

    return view("visaTracking/district/district_body", $data);
    }

    /**
     * To add
     */
    public function add(): string
    {
        $data['state'] =  $this->stateModel->findAll();

        return view("visaTracking/district/add_district", $data);
    }
    
    /**
     * To Create District
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $rules = [
                "state_id" => ["label" => "State", "rules" => "required"],
                "name" => ["label" => "Name", "rules" => "required"],
             ];

            if ($this->validate($rules)) {
                $create_language = [
                    "state_id" => $this->request->getPost("state_id"),
                    "name" => $this->request->getPost("name"),
                ];

                $add_language = $this->districtModel->insert(
                    $create_language
                );
                return view("template/alert_modal", ["msg" => "District Added successfully!"]);
            } else {
                $data['state'] =  $this->stateModel->findAll();
                return view("visaTracking/district/add_district", $data);
            }
        }
    }

    /**
     * To Edit District
     */
    public function edit(): string
    {
        $id = $this->request->getGet("id");
        $data['district'] = $this->districtModel->find($id);
        $data['state'] =  $this->stateModel->findAll();
        return view("visaTracking/district/edit_district", $data);
    }

    /**
     * To Update District
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $id = $this->request->getPost("id");
            $rules = [
                "state_id" => ["label" => "State", "rules" => "required"],
                "name" => ["label" => "Name", "rules" => "required"],
            ];
            if ($this->validate($rules)) {
                $update_language = [
                    "state_id" => $this->request->getPost("state_id"),
                    "name" => $this->request->getPost("name"),
                ];
                $this->districtModel->update($id, $update_language);
                return view("template/alert_modal", [ "msg" => "District updated successfully!"]);
            } else {
                $data['state'] =  $this->stateModel->findAll();
                return view("visaTracking/district/edit_district", $data);
            }
        }
    }
    
    /**
     * To Delete District
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        if ($this->districtModel->delete($id)) {
            return view("template/alert_modal", ["msg" => "District Deleted successfully!"]);
        }
    }
}
