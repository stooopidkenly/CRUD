<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class RegistrationController extends BaseController
{
    protected $userModel;
    public function index()
    {
        //
    }

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function registerView()
    {
        return view('register');
    }

    public function registerAccount()
    {
        try {
            //hash the password first
            $password = $this->request->getPost('password');
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // get all form data
            $data = [
                'firstname' => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'lastname' => $this->request->getPost('lastname'),
                'email' => $this->request->getPost('email'),
                'password' => $hashedPassword
            ];

            if ($data) {
                $this->userModel->insert($data);
                return redirect('/')->with('registered', 'Account Registration Successful');
            } else {
                return redirect()->back()->with('incomplete', 'Account Information is Incomplete!');
            }
        } catch (\Exception $e) {
            return redirect('/')->with('failed', 'Something went wrong, Try Again' . $e->getMessage());
        }
    }
}
