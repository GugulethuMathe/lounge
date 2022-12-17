<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\OrderDetailsModel;
use App\Models\OrderModel;

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
        $data['packages'] = $model->getPackages()->getResult();

        return view('home-front/book', $data);
    }
    public function bookThankyou()
    {

        return view('home-front/thank-you');
    }
    public function saveOrder()
    {
        
        $request = \Config\Services::request();
        $order = [
            'customer_id' => $request->getVar('customer_id'),
            'status' => 'Pending',
            'package_id' => $request->getVar('package_id'),
        ];
        // save order
        $orderModel = new OrderModel();

        $orderModel->save($order);
        $order_id = $orderModel->getInsertID();
        $products = $request->getVar('products');
        // Save order details
        foreach ($products as $product) {
            $orderDetailsModel = new OrderDetailsModel();
            $prod = json_decode($product, true);

            $orderDetails = [
                'order_id' => $order_id,
                'product_id' => $prod[0],
                'price' => $prod[1],
            ];
            $orderDetailsModel->save($orderDetails);
        }
        /* Make sure you clear the following session after successful save
        $_SESSION['customer_id']
         */
		$this->updateEventStatus();
        return redirect()->to('/thank-you');
    }

    public function addCustomer()
    {

        $request = \Config\Services::request();
        $session = session();

        $model = new CustomerModel();
        // $data['packages']  = $model->getPackages()->getResult();

        $newData = [
            'first_name' => $request->getVar('first_name'),
            'last_name' => $request->getVar('last_name'),
            'email' => $request->getVar('email'),
            'phone' => $request->getVar('phone'),
            'event_status' => 'Leads',
            'start_date' => date("Y-m-d", strtotime($request->getVar('start_date'))),
            'end_date' => date("Y-m-d", strtotime($request->getVar('end_date'))),
            'number' => $request->getVar('number'),
        ];
     
        $model->save($newData);
        // return $this->response->setJSON($data);
        $session->setFlashdata("success", "Successfully");
        $session->set(['customer_id' => $model->getInsertID()]);

        return redirect()->to('/choose-package');

    }

    public function approveOrder()
    {
        $data = [];
        $model = new CustomerModel();

        $request = \Config\Services::request();
        $session = session();
		$id = $request->getVar('customer_id');
        $data = array(
            'event_status' => 'Approved',
            'start_date' => date("Y-m-d", strtotime($request->getVar('start_date'))),
            'end_date' => date("Y-m-d", strtotime($request->getVar('end_date')))

        );
        $model->update($id, $data);
        $session->setFlashdata("success_update", "Order approved Successfully");
        // return redirect()->to('/apartments');
    }
    public function checkCustomerOut()
    {
        $data = [];
        $model = new CustomerModel();

        $request = \Config\Services::request();
        $session = session();
		$id = $request->getVar('customer_id');
        $data = array(
            'event_status' => 'Check_out',
         

        );
        $model->update($id, $data);
        $session->setFlashdata("success_update", "Order approved Successfully");
        // return redirect()->to('/apartments');
    }


	public function updateEventStatus()
    {
        $data = [];
        $model = new CustomerModel();

        $request = \Config\Services::request();
        $session = session();
		$id = $request->getVar('customer_id');
        $data = array(
            'event_status' => 'Pending',            
        );
        $model->update($id, $data);
       
        // return redirect()->to('/apartments');
    }
    
    public function select_package()
    {
        // $model = new CustomerModel();
        // $data['packages']  = $model->getPackages()->getResult();
        if (!isset($_SESSION['customer_id'])) {
            return redirect()->to('/book');
        }

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
            'catergory_id' => $request->getVar('catergory_id'),
            // 'is_featured' => $request->getVar('is_featured')
        ];
        $model->save($newData);
        return $this->response->setJSON($data);

    }
}
