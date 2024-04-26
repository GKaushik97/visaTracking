<?php

namespace App\Models\visaTracking;

use CodeIgniter\Model;

/**
 * District Model
 */
class DistrictModel extends Model
{
    protected $table                = 'districts';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $allowedFields        = ['state_id', 'name'];
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
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
        $this->builder = $this->db->table('districts');
    }

    /**
     * Retrieve all districts with optional filtering and pagination
     */
    public function getAllDistricts($params)
    {
        $this->builder->select('*');

        if (!empty($params['keywords'])) {
            $this->builder->like('name', $params['keywords']);
        }

        if (!empty($params['state_id'])) {
            $this->builder->where('state_id', $params['state_id']);
        }
        $this->builder->orderBy($params['sort_by'], $params['sort_order']);
        $this->builder->limit($params['rows'], (($params['pageno'] -1)*$params['rows']));
        $query = $this->builder->get();

        return $query->getResultArray();
    }

    /**
     * Count all districts with optional filtering
     */
    public function countAllDistricts($params)
    {
        $this->builder->select('COUNT(*) as tRecords');

        if (!empty($params['keywords'])) {
            $this->builder->like('name', $params['keywords']);
        }

        if (!empty($params['state_id'])) {
            $this->builder->where('state_id', $params['state_id']);
        }

        $result = $this->builder->get();
        return $result->getResultArray()[0]['tRecords'];
    }
}
