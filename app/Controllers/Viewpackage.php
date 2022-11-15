<?php

namespace App\Controllers;
use App\Models\PackageModel;
class Viewpackage extends BaseController
{
	public function index()
	{	
        $request = \Config\Services::request();
        $PackageModel = new PackageModel();
    
        $tenant_id = $request->getVar('tenant_id');
        $data['users'] = $PackageModel->getTenantById($tenant_id);
        return view('backend/view_tenant', $data);
	}
	public function userRegister()
	{
		
		return view('frontend/home');
	}
public function view_apartment(){
	

	
}

}
