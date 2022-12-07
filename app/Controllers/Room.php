<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomModel;


class Room extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function index()
    {
        $model = new RoomModel();
        $data['rooms']  = $model->getRooms()->getResult();
       
		return view('rooms/room', $data);
    }

	public function rooms()
    {
        $model = new RoomModel();
        $data['rooms']  = $model->getRooms()->getResult();
       
        return view('rooms/room', $data);
    }
	public function readRooms()
    {
        $model = new RoomModel();
        $data['rooms']  = $model->getRooms()->getResult();
       
		return $this->response->setJSON($data);
    }

	public function addRoom()
	{
		$data = [];
		$request = \Config\Services::request();
		$session = session();

			$model = new RoomModel();
			$request = \Config\Services::request();
			$newData = [
				'room_type' => $request->getVar('room_type'),
				'beds_total' => $request->getVar('beds_total'),
				'bed_types' => $request->getVar('bed_types'),
				'room_image' => $request->getVar('room_image'),
				'description' => $request->getVar('description'),
				'price' => $request->getVar('price'),
				'occupants' => $request->getVar('occupants')
			];
			
			$model->save($newData);
			return $this->response->setJSON($data);		
	}

	public function delete()
    {
        $model = new RoomModel();
        $request = \Config\Services::request();

        $id = $request->getVar('id');
        $model->deleteManager($id);
		$session = session();
			$session->setFlashdata('success', 'User Deleted Successfully');
        return redirect()->to('/rooms');
    }
}
