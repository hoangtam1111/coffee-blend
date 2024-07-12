<?php
namespace App\Repositories\Interfaces;
interface BookingRepositoryInterface{
    public function getAllBookings();
    public function getBooking($id);
    public function insertBooking($data);
    public function updateBooking($data,$id);
    public function deleteBooking($id);
}
