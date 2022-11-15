<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatergoriesModel;


class Catergories extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
    {
        $model = new CatergoriesModel();
        $data['catergories']  = $model->getCategories()->getResult();       
        return view('catergories/catergories', $data);
    }
	public function catergories()
    {
        $model = new CatergoriesModel();
        $data['catergories']  = $model->getCategories()->getResult();
       
        return view('catergories/catergories', $data);
    }
	public function readCatergories()
    {
        $model = new CatergoriesModel();
        $data['catergories']  = $model->getCategories()->getResult();
      
		return $this->response->setJSON($data);
    }

	public function addCategories()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();

			$model = new CatergoriesModel();
			$request = \Config\Services::request();
			$newData = [
				'name' => $request->getVar('name')
				
			];	
			$model->save($newData);
			return $this->response->setJSON($data);		
	}

	public function delete()
    {
        $model = new CatergoriesModel();
        $request = \Config\Services::request();

        $id = $request->getVar('id');
        $model->deleteManager($id);
		$session = session();
			$session->setFlashdata('success', 'User Deleted Successfully');
        return redirect()->to('/managers');
    }
}
