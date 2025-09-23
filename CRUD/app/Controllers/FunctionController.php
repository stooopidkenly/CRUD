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

    public function deleteUser($id = null)
    {
        if ($id) {
            $this->userModel->delete($id);
            return redirect()->back()->with('success', 'User deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Invalid user ID!');
        }
    }

    public function editUser($id = null)
    {
        if ($id) {
            $this->userModel->update($id);
            return redirect()->back()->with('editSuccess', 'User Edited Successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid user ID!');
        }
    }
}
