<?php

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * Country
 */
class Country extends BaseController
{
	protected $countryModel;

	public function __construct()
    {
        $this->countryModel = model('App\Models\visaTracking\CountryModel');
    }

	/**
	 * Index Method
	 */
	public function index(): string 
	{
		$data['params'] = [
			"rows" => '10',
			"pageno" => '1',		
			"sort_by" => 'name',
			"sort_order" => 'asc',
			"keywords" => "",
		];
		$data["countries"] = $this->countryModel->orderBy("name", "asc")->findAll();
		$data["tRecords"] = $this->countryModel->countAllResults();

        $data["page"] = [
            "title" => "Country ",
            "page_title" => "Country Module",
            "js" => ["country"],
        ];

        return view("visaTracking/country/countries", $data); 
	}

	/**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data["params"] = $this->request->getPost();
        $data["tRecords"] = $this->countryModel->like("name", $data["params"]["keywords"])->countAllResults();
        if (isset($data['params']['keywords']) && !empty($data['params']['keywords'])) {
            $data['countries'] = $this->countryModel->like('name', $data['params']['keywords'])->orderBy($data['params']['sort_by'], $data['params']['sort_order'])->findAll();
        }
        else {
            $data['countries'] = $this->countryModel->orderBy($data['params']['sort_by'], $data['params']['sort_order'])->findAll();

        }
        return view("visaTracking/country/country_body", $data);
    }

    /**
     * To Add Country
     */
    public function add(): string 
    {
    	return view('visaTracking/country/country_add');
    }

    /**
     * To Create Country
     */
     public function create(): string
     {
        if($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = [
                "name" => ["label" => "name","rules" => "required"],
            ];
            if($this->validate($rules)) {
                $create_country= [
                    "name" => $this->request->getPost("name"),
                ];
                $add_country = $this->countryModel->insert($create_country);
               return view("template/alert_modal", ["msg" => "Country Added Successfully!",]);
            } else {
                return view("visaTracking/country/country_add");
            }
        }
    }

    /**
     * To Edit Country
     */
    public function edit(): string 
    {
    	$id = $this->request->getGet('id');
    	$data['country'] = $this->countryModel->find($id);
    	return view('visaTracking/country/country_edit',$data);
    }

    /**
     * To Update Country
     */
    public function update(): string 
    {
    	if($this->request->getPost(csrf_token()) == csrf_hash()){
    		$id = $this->request->getPost('id');
    		$rules = [
    			"name" => ["label" => "name","rules" => "required"],
    		];
    		if($this->validate($rules)){
    			$update_country = [
    				"name" => $this->request->getPost('name'),
    			];
    			$this->countryModel->update($id,$update_country);
    			return view("template/alert_modal", ["msg" => "Country Updated Successfully!",]);
    		}
    	}
    }

    /**
     * To Delete Country
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        
        if ($this->countryModel->delete($id)) {
            return view("template/alert_modal", ["msg" => "Country Deleted successfully!",]);
        }
    }


}
