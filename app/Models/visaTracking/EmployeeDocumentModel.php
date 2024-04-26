<?php

namespace  App\Models\visaTracking;

use codeIgniter\Model;

/**
 * Employee Document Model
 */

class EmployeeDocumentModel extends Model 
{
	protected $table = 'employee_documents';
	protected $primaraykey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType = 'array';

	protected $useSoftDeletes = false;

	protected $allowedFields = array(
		'employee_id',
		'document_type_id',
		'file',
	);

	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';


}

