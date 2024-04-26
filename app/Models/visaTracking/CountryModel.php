<?php

namespace App\Models\visaTracking;

use CodeIgniter\Model;

/**
 * Country Model
 */
class CountryModel extends Model
{
    protected $table                = 'country';
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
}