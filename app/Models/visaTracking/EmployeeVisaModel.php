<?php

namespace App\Models\visaTracking;

use CodeIgniter\Model;

/**
 * VisaTypeModel Model
 */
class EmployeeVisaModel extends Model
{
    protected $table                = 'employee_visa';
    protected $primaryKey           = 'id';

    protected $useAutoIncrement     = true;

    protected $returnType           = 'array';

    protected $useSoftDeletes       = false;

    protected $allowedFields        = array(
        'employee_id',
        'visa_no',
        'visa_type',
        'applied_date',
        'issued_date',
        'start_date',
        'end_date',
        'duration',
        'purpose',
        'address',
        'place_of_issue',
        'created_by',
        'updated_by',
        'deleted_by',
    );

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
    protected $db;
    protected $builder;
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('employee_visa');
    }
    /**
     * Get Employee Visa Expiry Details
     */ 
    public function getVisaExpiryDetails()
    {
        $this->builder->select('SUM(IF(DATEDIFF(end_date, CURRENT_DATE()) < 0,1,0)) as less_than_0, SUM(IF(DATEDIFF(end_date, CURRENT_DATE()) BETWEEN 0 AND 30,1,0)) as less_than_30, SUM(IF(DATEDIFF(end_date,CURRENT_DATE()) BETWEEN 31 AND 90,1,0)) as less_than_90');
        $this->builder->where('deleted_at', NULL);
        $this->builder->having('less_than_0 >', 0);
        $this->builder->orHaving('less_than_30 >', 0);
        $this->builder->orHaving('less_than_90 >', 0);
        $qry = $this->builder->get();
        return $qry->getResultArray()[0];
    }
}