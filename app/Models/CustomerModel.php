<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'customers';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'first_name',
		'last_name',
		'email',
		'number',
		'phone',
		'created_at',
		'description',
		'event_status',
		'start_date',
		'end_date'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ["beforeInsert"];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	protected function beforeInsert(array $data)
	{
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function passwordHash(array $data)
	{
		if (isset($data['data']['password'])) {
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		}

		return $data;
	}
	// public function getCustomers()
    // {
    //     $builder = $this->db->table('customers');
    //     $builder->select('*');
    //     $builder->where('event_status','Pending' );
       
    //     return $builder->get();
    // }
	public function getCustomers() {
        $sql = "SELECT * FROM customers WHERE event_status ='Pending'";
        $query =  $this->db->query($sql);
  
        return $query->getRow();
      }

	  public function getAllOrders() {
        $sql = "SELECT * FROM customers WHERE event_status ='Pending' AND event_status ='Approved'";
        $query =  $this->db->query($sql);
  
        return $query->getRow();
      }


	  public function getLeads() {
        $sql = "SELECT * FROM customers WHERE event_status ='Leads'";
        $query =  $this->db->query($sql);
  
        return $query->getRow();
      }

	public function deleteCustomer($id)
    {
        $query = $this->db->table('customers')->delete(array('id ' => $id));
        return $query;
    } 
 
}