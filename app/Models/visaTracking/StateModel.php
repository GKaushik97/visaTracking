<?php

namespace App\Models\visaTracking;

use Codeigniter\Model;

/**
 * State Model
 */

class StateModel extends Model
{
	protected $table = 'states';
	protected $primarykey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType = 'array';

	protected $useSoftDeletes = false;

	protected $allowedFields = array(
		
		'country_id',
		'name',
	);

	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';

	//Query Builder
	protected $db;
	protected $builder;

	/**
	 * constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->db = \Config\Database::connect();
		$this->builder = $this->db->table('states');

	}

	public function getAllStates($params)
	{
		$this->builder->select('*');

		if (!empty($params['keywords'])) {
            $this->builder->like('name', $params['keywords']);
        }

        if (!empty($params['country_id'])) {
            $this->builder->where('country_id', $params['country_id']);
        }
        $this->builder->orderBy($params['sort_by'], $params['sort_order']);
        $this->builder->limit($params['rows'], (($params['page_no'] -1)*$params['rows']));
        $query = $this->builder->get();

        return $query->getResultArray();

	}

	public function countAllStates($params)
    {
        $this->builder->select('COUNT(*) as total_states');

        if (!empty($params['keywords'])) {
            $this->builder->like('name', $params['keywords']);
        }

        if (!empty($params['country_id'])) {
            $this->builder->where('country_id', $params['country_id']);
        }

        $result = $this->builder->get();
        return $result->getResultArray()[0]['total_states'];
    }

	

}