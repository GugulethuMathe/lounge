<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;


class Book extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		return view('home-front/book');
	}
	
	public function book()
	{
		$model = new CustomerModel();
		$data['packages']  = $model->getPackages()->getResult();

		return view('home-front/book', $data);
	}

	public function customerCheckDate()
	{
		
		$request = \Config\Services::request();
		$session = session();
		
		$model = new CustomerModel();
		$data['packages']  = $model->getPackages()->getResult();
		
			$newData = [
				'first_name' => $request->getVar('first_name'),
				'last_name' => $request->getVar('last_name'),
				'email' => $request->getVar('email'),
				'phone' => $request->getVar('phone'),
				'start_date' => $request->getVar('start_date'),
				'end_date' => $request->getVar('end_date')
			];
			
			$model->save($newData);
			return $this->response->setJSON($data);
		
	}

	public function select_package()
	{
		// $model = new CustomerModel();
		// $data['packages']  = $model->getPackages()->getResult();

		return view('home-front/packages_book');
	}

	public function addProduct()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();

			$model = new CustomerModel();
			$request = \Config\Services::request();
			$newData = [
				'product_name' => $request->getVar('product_name'),
				'product_code' => $request->getVar('product_code'),
				'quantity' => $request->getVar('quantity'),
				'price' => $request->getVar('price'),
				'description' => $request->getVar('description'),
				'catergory_id' => $request->getVar('catergory_id')
				// 'is_featured' => $request->getVar('is_featured')
			];
			$model->save($newData);
			return $this->response->setJSON($data);
		
	}
}
