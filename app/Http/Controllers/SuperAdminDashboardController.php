<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class SuperAdminDashboardController extends Controller
{
    public $userController;

    public function __construct()
    {
        $this->userController = new UserController();
    }
    

    public function superAdminDashboard(){
        $users = $this->userController->getUsers();
        return view('superAdminDashboard', compact('users'));
    }    
}
