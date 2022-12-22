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
        // $session->setFlashdata("success", "Successfully");
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
        $session->setFlashdata("success_approve", "Order approved Successfully");
        return redirect()->to('/dashboard');
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
        $session->setFlashdata("check_out", "Customer check out Successfully");
        return redirect()->to('/orders');
    }


    public function updateEventStatus()
    {
        $data = [];
        $model = new CustomerModel();

        $request = \Config\Services::request();
        $email = \Config\Services::email(); 
        $session = session();
        $id =  $request->getVar('customer_id');
        $data = array(
            'event_status' => 'Pending',
        );
        $model->update($id, $data);

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM customers WHERE  id='" . $id . "'");
        $results = $query->getResult();
        $first_name = "";
        $last_name = "";
        $phone = "";
        $cus_email = "";
        $created_at = "";
        $start_date = "";
        $end_date = "";
        $number = "";
        
        foreach ($results as $cus) {
            $first_name = $cus->first_name;
            $last_name = $cus->last_name;
            $phone = $cus->phone;
            $cus_email = $cus->email;
            $created_at = $cus->created_at;
            $start_date = $cus->start_date;
            $end_date = $cus->end_date;
            $number = $cus->number;
        }


        $email = \Config\Services::email(); // loading for use
        $request = \Config\Services::request();

        // This is for getting form data while submit
        $full_name = $first_name . " " .  $last_name;


        $email->setTo($cus_email);
        $email->setFrom('info@izikodelounge.co.za', 'Iziko de Lounge');

        $data = array(
            'full_name' => $first_name,

            'phone' => $phone,
            'cus_email' => $cus_email,
            'created_at' => $created_at,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'number' => $number

        );
        $data1['data'] = $data;

        $email->setSubject("Application submitted successfully");
        $email->setMessage(view('template/customer', $data1));

        if ($email->send()) {
            //Send to admins
            $email->clear(TRUE);
            // $email->setTo(['butho@mpholdings.co.za', 'gugulethumath@gmail.com','anthony.mpofu@gmail.com','calvinhm64@gmail.com','calvinhm64@gmail.com']);
            $email->setTo(['info@izikodelounge.co.za']);
            $email->setFrom('info@izikodelounge.co.za', 'Iziko de Lounge');
            // If you need to send mail to CC and BCC
            // $email->setCC('another@another-user.com');
            // $email->setBCC('other@other-user.com');
            $data = array(
                'full_name' => $first_name,

                'phone' => $phone,
                'cus_email' => $cus_email,
                'created_at' => $created_at,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'number' => $number
            );
            $data_admin['data'] = $data;

            $email->setSubject("New application on Iziko de Lounge");
            $email->setMessage(view('template/admin', $data_admin));
            $email->send();
            $email->clear(TRUE);
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
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
            'catergory_id' => $request->getVar('catergory_id')
            // 'is_featured' => $request->getVar('is_featured')
        ];
        $model->save($newData);
        return $this->response->setJSON($data);
    }
}
