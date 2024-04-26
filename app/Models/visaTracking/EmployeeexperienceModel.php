<?

namespace App\Models\Hrm;

use CodeIgniter\Model;  

class EmployeeexperienceModel extends Model 
{
    protected $table = 'employee_experience';
    protected $primaryKey = 'id';
    protected $useAutoIncrement    = true;
    protected $returnType          = 'array';
    protected $useSoftDeletes      = false;
    protected $allowedFields = array(
        'employee_id',
        'company_name',
        'designation',
        'from_date',
        'to_date',
        'email',
        'mobile',
        'address',
        'country',
        'current_organisation',
        'created_by',
        'updated_by'

    );

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

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