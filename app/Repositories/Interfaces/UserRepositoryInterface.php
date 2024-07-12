<?php
namespace App\Repositories\Interfaces;
interface UserRepositoryInterface{
    public function getAllUsers();
    public function getUser($id);
    public function insertUser($data);
    public function updateUser($data,$id);
    public function deleteUser($id);
}
