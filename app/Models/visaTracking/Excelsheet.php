<?php

namespace App\Models\visaTracking;

use Codeigniter\Model;

/**
 * Excel Model
 */

class Excelsheet extends Model
{
	protected $table = 'excel_upload';
	protected $primarykey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType = 'array';

	protected $useSoftDeletes = false;

	protected $allowedFields = array(	
		'name',
		'age',
		'state',
	);

	//Query Builder
	protected $db;
	protected $builder;

}