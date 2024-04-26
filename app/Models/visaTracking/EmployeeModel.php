<?php

namespace App\Models\visaTracking;

use Codeigniter\Model;

/**
 * Employee Model
 */

class EmployeeModel extends Model
{
	protected $table = 'employees';
	protected $primarykey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = array(		
		'code',
		'fname',
		'lname',
		'gender',
		'dob',
		'mobile',
		'alt_mobile',
		'email',
		'place_of_birth',
		'passport_no',
		'passport_type',
		'passport_issued_date',
		'passport_expiry_date',
		'place_of_issue',
		'address1',
		'address2',
		'city',
		'district',
		'state',
		'country',
		'pincode',
		'nationality',
		'marital_status',
		'photo',
		'edu_qualification',
		'emp_experience',
		'employee_status',
		'emergency_id',
		'created_by',
		'updated_by',
	);
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';

	protected $builder;
	protected $db;

	public function __construct()
	{
		parent::__construct();
        $this->db = \Config\Database::connect();
		$this->builder = $this->db->table('employees');
	}
	/**
	 * Get Employees List
	 */
	public function getEmployees($params)
	{
		$this->builder->select('employees.*,ev.end_date');
		$this->getQryProcess($params);
		$this->builder->orderBy($params['sort_by'], $params['sort_order']);
		$this->builder->limit($params['rows'], ($params['page_no']-1)*$params['rows']);
		$qry = $this->builder->get();
		return $qry->getResultArray();
	}
	/**
	 * Get Employees Count
	 */
	public function getEmployeesCount($params)
	{
		$this->builder->select("count(employees.id) as trecords");
		$this->getQryProcess($params);
		$qry = $this->builder->get();
		return $qry->getRowArray()['trecords'];
	}
	/**
	 * Get Employees List Export
	 */
	public function getEmployeesExoprt($params, $cols, $i)
	{
		$this->builder->select("employees.code,$cols");
		$this->builder->join('districts d', 'employees.district = d.id','LEFT');
		$this->builder->join('states s', 'employees.state = s.id','LEFT');
		$this->builder->join('country c', 'employees.country = c.id','LEFT');
		$this->builder->join('employee_family ef', 'ef.id = employees.emergency_id','LEFT'); 
		$this->builder->join('family_relation fr', 'fr.id = ef.relation_id','LEFT');

		if(isset($params['keywords']) and !empty($params['keywords'])) {
			$this->builder->like('employees.fname', $params['keywords']);
			$this->builder->orLike('employees.lname', $params['keywords']);
		}
		if(isset($params['emp_status']) and $params['emp_status'] != "") {
			$this->builder->where('employees.employee_status', $params['emp_status']);
		}
		$this->builder->where('employees.deleted_at', NULL);
		$min = ($i-1) * 10000;
		$max = 10000;
		$this->builder->orderBy($params['sort_by'], $params['sort_order']);
		$this->builder->limit($max, $min);
		$qry = $this->builder->get();
		// echo $this->getLastQuery();
		return $qry->getResultArray();
	}
	/**
	 * Get Employee Query Process
	 */
	public function getQryProcess($params)
	{
		$this->builder->join('employee_visa ev','ev.employee_id=employees.id', 'LEFT');
		$this->builder->where('employees.deleted_at', NULL);
		if(isset($params['keywords']) and !empty($params['keywords'])) {
			$this->builder->like('employees.fname', $params['keywords']);
			$this->builder->orLike('employees.lname', $params['keywords']);
			$this->builder->orLike('employees.passport_no', $params['keywords']);
			$this->builder->orLike('employees.code', $params['keywords']);
		}
		if(isset($params['emp_status']) and $params['emp_status'] != "") {
			$this->builder->where('employees.employee_status', $params['emp_status']);
		}
		if(isset($params['name']) and $params['name'] != "") {
			$this->builder->like('employees.fname', $params['name']);
			$this->builder->orLike('employees.lname', $params['name']);
		}
		if(isset($params['code']) and $params['code'] != "") {
			$this->builder->where('employees.code', $params['code']);
		}
		if(isset($params['passport_no']) and $params['passport_no'] != "") {
			$this->builder->where('employees.passport_no', $params['passport_no']);
		}
		if(isset($params['gender']) and $params['gender'] != "") {
			$this->builder->where('employees.gender', $params['gender']);
		}
		if(isset($params['mobile']) and $params['mobile'] != "") {
			$this->builder->where('employees.mobile', $params['mobile']);
		}
		if(isset($params['from_date']) and !empty($params['from_date']) and isset($params['to_date']) and !empty($params['to_date'])) {
			if($params['expired'] == "1") {
				$this->builder->where('employees.passport_expiry_date <=', $params['to_date']);
			}else {
				$this->builder->where('employees.passport_expiry_date >=', $params['from_date']);
				$this->builder->where('employees.passport_expiry_date <=', $params['to_date']);
			}
		}
		if(isset($params['start_date']) and !empty($params['start_date']) and isset($params['end_date']) and !empty($params['end_date'])) {
			if($params['expired'] == "1") {
				$this->builder->where('ev.end_date <=', $params['end_date']);
			}else {
				$this->builder->where('ev.end_date >=', $params['start_date']);
				$this->builder->where('ev.end_date <=', $params['end_date']);
			}
		}
	}

	/**
	 * Emergency Contact Details
	 */ 
	public function getEmergencyContactDetails($id)
	{
		$this->builder->select('CONCAT_WS(" ", ef.fname,ef.lname) as fullname, fr.name as relation,ef.mobile,ef.dob,ef.nationality,ef.profession');
		$this->builder->join('employee_family ef', 'ef.id = employees.emergency_id', 'LEFT');
		$this->builder->join('family_relation fr', 'ef.relation_id = fr.id', 'LEFT');
		$this->builder->where('employees.deleted_at', NULL);
		$this->builder->where('employees.id', $id);
		return $this->builder->get()->getRowArray();
	}

	/**
	 * To get Passport Types
	 */ 
	public function getPassportTypes()
	{
		$qry_builder = $this->db->table('passport_types');
		return $qry_builder->select('*')->get()->getResultArray();
	}

	/**
	 * Get Employee Passport Expiry Details
	 */ 
	public function getPassportExpiryDetails()
	{

		$this->builder->select('SUM(IF(DATEDIFF(passport_expiry_date, CURRENT_DATE()) < 0,1,0)) as less_than_0, SUM(IF(DATEDIFF(passport_expiry_date, CURRENT_DATE()) BETWEEN 0 AND 30,1,0)) as less_than_30, SUM(IF(DATEDIFF( passport_expiry_date,CURRENT_DATE()) BETWEEN 31 AND 90,1,0)) as less_than_90');
		$this->builder->where('deleted_at', NULL);
		$this->builder->having('less_than_0 >', 0);
		$this->builder->orHaving('less_than_30 >', 0);
		$this->builder->orHaving('less_than_90 >', 0);
		$qry = $this->builder->get();
		return $qry->getRowArray();
	}
}