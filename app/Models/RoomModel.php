<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'room';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'room_type',
		'beds_total',
		'bed_types',
		'description',
		'occupants',
		'created_at',
		'price',
		'updated_at'
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
	public function getRooms()
    {
        $builder = $this->db->table('room');
        $builder->select('*');
       
        return $builder->get();
    }
	public function deleteRoom($id)
    {
        $query = $this->db->table('room')->delete(array('id ' => $id));
        return $query;
    } 
 
}