<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
class UserRepository implements  UserRepositoryInterface{
    public function getAllUsers(){
        return User::get();
    }
    public function getUser($email){
        return User::where('email',$email)->first();
    }
    public function insertUser($data){
        User::create($data);
    }
    public function updateUser($data,$id){
        $user=User::where('id',$id)->first();
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=$data['password'];
        $user->save();
    }
    public function deleteUser($id){
        $user=User::find($id);
        $user->delete();
    }
}
