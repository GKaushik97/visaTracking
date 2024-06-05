<?php
namespace app\Controllers\visaTracking;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

/**
 * Api Creation
 */
class VisaApi extends BaseController
{
	use ResponseTrait;
	private $employee_model;
	public function __construct()
	{
		$this->employee_model = model('App\Models\visaTracking\EmployeeModel');
		
	}

	public function index() {
		$this->view = false;
		$params = ['rows' => 20,
				   'page_no' => 1,
				   'sort_by' => 'created_at',
				   'sort_order' => 'desc',
				  ];
		$fetch_data = $this->employee_model->getEmployees($params);
		$fetch_data1 = (object)($fetch_data);
		// print "<pre>";print_r($fetch_data1);exit;
		$result = [
			'status' => 200,
			'data' => $fetch_data1,
		];
		return $this->respond($result);
	}
}