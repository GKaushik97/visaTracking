<?php

namespace App\Models\visaTracking;

use CodeIgniter\Model;

/**
 * VisaTypeModel Model
 */
class VisaTypeModel extends Model
{
    protected $table                = 'visa_types';
    protected $primaryKey           = 'id';

    protected $useAutoIncrement     = true;

    protected $returnType           = 'array';

    protected $useSoftDeletes       = false;

    protected $allowedFields        = array(
        'name',
    );

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
    protected $builder;
    /*public function __construct()
    {
        // $this->builder = $this->db->table('visa_types');
    }*/
   /* public function getPassportExpiryDetails()
    {
        $cur_date = date('Y-m-d');
        $this->builder->select('COUNT(DATEDIFF(passport_expiry_date,$cur_date))')
    }*/
}