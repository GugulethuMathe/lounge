<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PackageModel;
use App\Models\PackproModel;


class Package extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
    {
        $model = new PackageModel();
        $data['packages']  = $model->getPackages()->getResult();
       
        return view('packages/packages', $data);
    }
	public function book()
    {
        $model = new PackageModel();
        $data['packages']  = $model->getPackages()->getResult();
       
        return view('home-front/book', $data);
    }

	public function packages()
    {
        $model = new PackageModel();
        $data['packages']  = $model->getPackages()->getResult();
       
        return view('packages/packages', $data);
    }
	public function readPackages()
    {
        $model = new PackageModel();
        $data['packages']  = $model->getPackages()->getResult();
       
		return $this->response->setJSON($data);
    }

	// public function addPackage()
	// {
	// 	$data = [];
	// 	$request = \Config\Services::request();
	// 	$session = session();

	// 		$model = new PackageModel();
	// 		$request = \Config\Services::request();
	// 		$newData = [
	// 			'name' => $request->getVar('name'),
	// 			'is_featured' => $request->getVar('is_featured')
	// 		];
			
	// 		$model->save($newData);
	// 		return $this->response->setJSON($data);
		
	// }

    public function addPackageProduct(){
        
			$model = new PackproModel();
			$request = \Config\Services::request();

			$newData = [
				'package_id' => $request->getVar('package_id'),
				'products' => $request->getVar('products')
			]; 

            foreach($newData['products'] as $product){
                $record = [
                    'package_id' => $newData['package_id'],
                    'product_id' => $product
                ];
                $model->save($record);
            }
           echo 'Submitted';
    }

	public function addPackage()
    {
        $data = [];
        $model = new PackageModel();
        $request = \Config\Services::request();

        $file = $request->getFile("package_image");

        $file_type = $file->getClientMimeType();

        $valid_file_types = array("image/png", "image/jpeg", "image/jpg");
        $session = session();

        if (in_array($file_type, $valid_file_types)) {

            // $id_image = $file->getName();
            $newName = $file->getRandomName();
            
            if ( $file->move('uploads', $newName)) {

                $data = array(
                    'name' => $request->getVar('name'),
                    'is_featured' => $request->getVar('is_featured'),
                    "img" => "/uploads/" . $newName,
                );

                if ($model->save($data)) {
                    $session->setFlashdata("success_added", "Package Added Successfully");

                    return redirect()->to('/packages');
                }
            } else {
                $session->setFlashdata("error", "Failed to move file");
            }
        } else {
            $session->setFlashdata("error", "Invalid file type selected");
        }
    }
	public function addProductPackage()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();

			$model = new PackageModel();
			$request = \Config\Services::request();
			$newData = [
				'name' => $request->getVar('name'),
				'is_featured' => $request->getVar('is_featured')
			];
			
			$model->save($newData);
			return $this->response->setJSON($data);
		
	}
	public function delete()
    {
        $model = new PackageModel();
        $request = \Config\Services::request();

        $id = $request->getVar('id');
        $model->deleteManager($id);
		$session = session();
			$session->setFlashdata('success', 'User Deleted Successfully');
        return redirect()->to('/managers');
    }
}
