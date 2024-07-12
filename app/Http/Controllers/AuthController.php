<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $user;
    public function __construct(UserRepositoryInterface $userRepositoryInterface){
        $this->user=$userRepositoryInterface;
    }
    public function login(){
        return view('login');
    }
    public function storeLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
        ]);
        $user=$this->user->getUser($request->get('email'));
        if($user){
            if (Hash::check($request->get('password'), $user->password)){
                session()->put('id', $user->id);
                session()->put('email',$user->email);
                session()->put('name', $user->name);
                session()->put('avatar', $user->avatar);
                session()->put('role', $user->role);
                if($user->role=='admin')
                    return redirect()->route('admin');
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')->with('password','email or password was wrong');
        }
    }
    public function register(){
        return view('register');
    }
    public function storeRegister(Request $request){

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8'
        ],[
            'name.required' => 'Please enter your name',
            'name.max' => 'Max size your name is 50',
            'email.required' => 'Please enter your email',
            'email.unique' => 'Please enter anoder email',
            'password.required' => 'Please enter your password',
            'password.min' => 'Min size your password is 8'
        ]);
        $this->user->insertUser([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 'user'
        ]);

        $user=$this->user->getUser($request->get('email'));
        session()->put('id', $user->id);
        session()->put('name', $user->name);
        session()->put('email',$user->email);
        session()->put('avatar', $user->avatar);
        session()->put('role', $user->role);
        return redirect()->route('home');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
