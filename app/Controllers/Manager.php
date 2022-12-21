<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ManagerModel;
use App\Models\UserModel;
use App\Models\TenantModel;


class Manager extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
    {
        $model = new ManagerModel();
        $data['managers']  = $model->getManagers()->getResult();
       
        return view('managers/managers', $data);
    }

	public function admins()
    {
        $model = new ManagerModel();
        $data['managers']  = $model->getManagers()->getResult();
       
        return view('managers/admins', $data);
    }
	public function readAdmins()
    {
        $model = new ManagerModel();
        $data['managers']  = $model->getManagers()->getResult();
       
		return $this->response->setJSON($data);
    }

	public function addManager()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();
		

			$model = new ManagerModel();
			$request = \Config\Services::request();
			$newData = [
				'first_name' => $request->getVar('first_name'),
				'last_name' => $request->getVar('last_name'),
				'email' => $request->getVar('email'),
				'contact' => $request->getVar('contact'),
				'password' => $request->getVar('password'),
				'roles' => $request->getVar('roles')
			];
			
			$model->save($newData);
			$session->setFlashdata("success_manager", "Admin added Successfully");
			return redirect()->to('/administrators');
		
	}
	public function delete()
    {
        $model = new ManagerModel();
        $request = \Config\Services::request();

        $id = $request->getVar('id');
        $model->deleteManager($id);
		$session = session();
			$session->setFlashdata('success', 'User Deleted Successfully');
        return redirect()->to('/managers');
    }
}
