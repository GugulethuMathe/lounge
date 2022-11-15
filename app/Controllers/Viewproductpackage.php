<?php

namespace App\Controllers;
use App\Models\ProductpackageModel;
class Viewproductpackage extends BaseController
{
	public function index(){
        $request = \Config\Services::request();

        $ProductpackageModel = new ProductpackageModel();
        $package_id = $request->uri->getSegment(2);

        $data['packages'] = $ProductpackageModel->getPackageById($package_id);
        return view('packages/add_prodto_package', $data);
	}
	

}
