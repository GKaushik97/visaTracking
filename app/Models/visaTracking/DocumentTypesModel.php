<?php

namespace App\Models\visaTracking;

use CodeIgniter\Model;

/**
 * DocumentTypes Model
 */
class DocumentTypesModel extends Model 
{
	protected $table = 'document_types';
	protected $primarykey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType = 'array';

	protected $useSoftDeletes = true;

	protected $allowedFields = array(
		'name',
	);
	protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
}