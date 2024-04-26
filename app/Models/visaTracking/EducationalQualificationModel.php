<?php

namespace App\Models\visaTracking;

use CodeIgniter\Model;

/**
 * Educational Qualification Model
 */
class EducationalQualificationModel extends Model
{
	protected $table   		  		= 'educational_qualification';
 	protected $primaryKey     		= 'id';

 	protected $useAutoIncrement     = true;

 	protected $returnType           = 'array';

 	protected $useSoftDeletes       = true;

 	protected $allowedFields        = array(
        'name',
    );

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
}