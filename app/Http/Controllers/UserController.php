<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;
    public function __construct(UserRepositoryInterface $userRepositoryInterface){
        $this->user=$userRepositoryInterface;
    }
    public function index(){
        $users = $this->user->getAllUsers();
        return view('admin.user.index', compact('users'));
    }
    public function insert(){
        return view('admin.user.insert');
    }

}
