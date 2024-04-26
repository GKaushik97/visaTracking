<?php

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * DocumentTypes
 */
class DocumentTypes extends BaseController
{
	protected $documenttypemodel;

	public function __construct()
	{
		$this->documenttypemodel = model('App\Models\visaTracking\DocumentTypesModel');

	}

	/**
	 * Index Method
	 */
	public function index(): string
	{
		$data['params'] = array(
			'keywords' => '',
		);
		$data['document'] = $this->documenttypemodel->orderBy('name','asc')->findAll();
		$data['total_records'] = $this->documenttypemodel->CountAllResults();

		$data['page'] = [
			'title' => "DocumentTypes",
			'page_title' => "DocumentTypes Module",
			
			'js' => ['document'],
		];

		return view("visaTracking/documenttypes/documents",$data);
	}

	/**
	 * Index Body Method
	 */
	public function indexBody(): string
	{
		$data['params'] = $this->request->getPost();
		$data['total_records'] = $this->documenttypemodel->like('name',$data['params']['keywords'])->CountAllResults();
		$data['document'] = $this->documenttypemodel->like('name',$data['params']['keywords'])->orderBy('name','asc')->findAll();

		return view("visaTracking/documenttypes/document_body",$data);
	}

	/**
	 * Add Document
	 */
	public function add(): string 
	{
		return view('visaTracking/documenttypes/add_document');
	}

	/**
	 * To insert user
	 */
	public function create(): string
	{
		$rules = ['name' => ['label' => 'Name','rules' => 'required',]];
		if($this->validate($rules)) {
			$data = array(
				'name' => $this->request->getPost('name'),
			);
			$document_data = $this->documenttypemodel->insert($data);
			return view('template/alert_modal', ['msg' => 'document added successfully!']);
		}
		else{
			return view('visaTracking/documenttypes/add_document');
		}
	}

	/**
	 * edit document
	 */
	public function edit(): string 
	{
		$id = $this->request->getGet('id');
		$data['docu'] = $this->documenttypemodel->find($id);
		return view('visaTracking/documenttypes/edit_document',$data);


	}

	/**
	 * update document
	 */
	public function update(): string 
	{
		$id = $this->request->getPost('id');
		$rules = ['name' => ['label' => 'Name','rules' => 'required',]];
		if($this->validate($rules)) {
			$document_data = array(
				'name' => $this->request->getPost('name'),
			);
			$this->documenttypemodel->update($id,$document_data);
			return view('template/alert_modal',['msg' => 'document updated successfully!']);
		}
		else{
			return view('visaTracking/documenttypes/edit_document');
		}

	}
    /**
     * delete document
     */
    public function delete(): string 
    {

	    $id = $this->request->getPost('id');
	    if($this->documenttypemodel->delete($id)) {
		return view('template/alert_modal', ['msg' => 'document deleted successfully!']);
	}
	
    }




}