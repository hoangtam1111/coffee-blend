<?php
namespace App\Repositories;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;
class BookingRepository implements  BookingRepositoryInterface{
    public function getAllBookings(){
        return Booking::get();
    }
    public function getBooking($id){
        return Booking::find($id);
    }
    public function insertBooking($data){
        Booking::create($data);
    }
    public function updateBooking($data,$id){
        $booking=Booking::where('id',$id)->first();
        $booking->first_name=$data['first_name'];
        $booking->last_name=$data['last_name'];
        $booking->time=$data['time'];
        $booking->date=$data['date'];
        $booking->phone=$data['phone'];
        $booking->message=$data['message'];
        $booking->active=$data['active'];
        $booking->user_id=$data['user_id'];
        $booking->save();
    }
    public function deleteBooking($id){
        $booking=Booking::find($id);
        $booking->delete();
    }
}
