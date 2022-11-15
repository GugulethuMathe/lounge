<?php

namespace App\Controllers;

use CodeIgniter\Controller;
// use App\Models\ManagerModel;
use App\Models\ManagerModel;

class Login extends Controller
{
    
    public function auth()
    {
        $session = session();
        $model = new ManagerModel();
        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $password = $request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'first_name'     => $data['first_name'],
                    'last_name'     => $data['last_name'],
                    'email'    => $data['email'],
                    'roles'    => $data['roles'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/home');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/home');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    
}
