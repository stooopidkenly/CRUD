<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function loginView()
    {
        return view('login');
    }

    public function loginAccount()
    {
        // get form data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // find account credentials in the database
        //where('column', $value)
        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session = session();
                $session->set([
                    'firstname' => $user['firstname'],
                    'middlename' => $user['middlename'],
                    'lastname' => $user['lastname'],
                    'email' => $user['firstname'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/landing')->with('loginSuccess', 'Login Successful');
            } else {
                return redirect()->back()->with('notFound', 'Account Not Found');
            }
        }
    }
}
