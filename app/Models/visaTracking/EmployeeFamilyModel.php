<?php
namespace App\Models\visaTracking;
use CodeIgniter\Model;

/**
 * Employee Family Model
 */
class EmployeeFamilyModel extends Model
{
	protected $table   		  		= 'employee_family';
 	protected $primaryKey     		= 'id';
 	protected $useAutoIncrement     = true;
 	protected $returnType           = 'array';
 	protected $useSoftDeletes       = false;
 	protected $allowedFields        = array(
        'fname',
        'lname',
        'relation_id',
        'employee_id',
        'mobile',
        'dob',
        'nationality',
        'profession',
        'created_by',
        'updated_by',
        'deleted_by',
    );
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
}