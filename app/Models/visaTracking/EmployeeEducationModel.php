<?php

namespace App\Models\visaTracking;

use CodeIgniter\Model;

/**
 * Employee Education Model
 */
class EmployeeEducationModel extends Model
{
    protected $table               = 'employee_education';
    protected $primaryKey          = 'id';
    protected $useAutoIncrement    = true;
    protected $returnType          = 'array';
    protected $useSoftDeletes      = false;
    protected $allowedFields       = ['employee_id', 'edu_qualification',  'course', 'university','certificate_no', 'start_year','end_year', 'graduated_year'];
    protected $useTimestamps       = true;
    protected $dateFormat          = 'datetime';
    protected $createdField        = 'created_at';
    protected $updatedField        = 'updated_at';
    
    // Query Builder 
    protected $db;
    protected $builder;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // Initiate database and query builder object
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }
}
