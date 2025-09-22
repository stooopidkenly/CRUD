<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class FunctionController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        //
    }

    public function showAll()
    {
        $users = $this->userModel->findAll();
        return view('landing', ['users' => $users]);
    }
}
