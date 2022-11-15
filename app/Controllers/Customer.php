<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\TenantModel;


class Customer extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		$model = new CustomerModel();
		$data['managers']  = $model->getManagers()->getResult();

		return view('managers/managers', $data);
	}

	public function admins()
	{
		$model = new CustomerModel();
		$data['managers']  = $model->getManagers()->getResult();

		return view('managers/admins', $data);
	}
	public function readAdmins()
	{
		$model = new CustomerModel();
		$data['managers']  = $model->getManagers()->getResult();

		return $this->response->setJSON($data);
	}

	public function addCustomer()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();
		$start_date = $request->getVar('start_date');
		$end_date = $request->getVar('end_date');
		$start_date = date("Y-m-d", strtotime($start_date) );
		$end_date = date("Y-m-d", strtotime($end_date) );
		$model = new CustomerModel();
		$request = \Config\Services::request();
		$newData = [
			'first_name' => $request->getVar('first_name'),
			'last_name' => $request->getVar('last_name'),
			'email' => $request->getVar('email'),
			'phone' => $request->getVar('phone'),
			'start_date' => $start_date,
			'end_date' => $end_date,
			'event_status' => 'Pending'
		];

		$model->save($newData);
		return $this->response->setJSON($data);
	}
	public function delete()
	{
		$model = new CustomerModel();
		$request = \Config\Services::request();

		$id = $request->getVar('id');
		$model->deleteCustomer($id);
		$session = session();
		$session->setFlashdata('success', 'User Deleted Successfully');
		return redirect()->to('/managers');
	}
}
