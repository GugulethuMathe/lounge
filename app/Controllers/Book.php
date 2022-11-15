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
	public function book_step_two()
	{
		// $model = new CustomerModel();
		// $data['packages']  = $model->getPackages()->getResult();

		return view('home-front/book_step_two');
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
