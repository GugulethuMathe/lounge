<?php

namespace App\Models;

use CodeIgniter\Model;

class PackageModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'packages';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'img',
		'is_featured'
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
	public function getPackageById($package_id){

        $sql = "select * from packages where id=$package_id";
        return $this->db->query($sql)->getResult();
    }
	public function getPackages()
    {
        $builder = $this->db->table('packages');
        $builder->select('*');
       
        return $builder->get();
    }
	public function deletePackage($id)
    {
        $query = $this->db->table('packages')->delete(array('id ' => $id));
        return $query;
    } 
 
}