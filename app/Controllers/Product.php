<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;


class Product extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
    {
        $model = new ProductModel();
        $data['products']  = $model->getProducts()->getResult();
       
        return view('products/products', $data);
    }

	public function products()
    {
        $model = new ProductModel();
        $data['products']  = $model->getProducts()->getResult();
       
        return view('managers/admins', $data);
    }
	public function readProducts()
    {
        $model = new ProductModel();
        $data['products']  = $model->getProducts()->getResult();
       
		return $this->response->setJSON($data);
    }

	public function addProduct()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();

			$model = new ProductModel();
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
	public function delete()
    {
        $model = new ProductModel();
        $request = \Config\Services::request();

        $id = $request->getVar('id');
        $model->deleteManager($id);
		$session = session();
			$session->setFlashdata('success', 'User Deleted Successfully');
        return redirect()->to('/managers');
    }
}
