<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\BookingRepositoryInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    private $booking;
    public function __construct(BookingRepositoryInterface $bookingRepositoryInterface){
        $this->booking=$bookingRepositoryInterface;
    }
    public function index(){
        $bookings=$this->booking->getAllBookings();
        return view('admin.booking.index',compact('bookings'));
    }
    public function addBooking(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'time' => 'required',
            'date' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ],[
            'first_name.required' => 'Please enter your First Name',
            'last_name.required' => 'Please enter your Last Name',
            'time.required' => 'Please enter your Time',
            'date.required' => 'Please enter your Date',
            'phone.required' => 'Please enter your Phone',
            'message.required' => 'Please enter your Message'
        ]);

        $this->booking->insertBooking([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'time' => $request->get('time'),
            'date' => Carbon::createFromFormat('m/d/Y', $request->get('date'))->format('Y/m/d'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message'),
            'user_id' => session()->get('id') == null ? 1 : session()->get('id')
        ]);
        return redirect()->route('home');
    }
    public function insert(){
        return view('admin.booking.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'time' => 'required',
            'date' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ],[
            'first_name.required' => 'Please enter your First Name',
            'last_name.required' => 'Please enter your Last Name',
            'time.required' => 'Please enter your Time',
            'date.required' => 'Please enter your Date',
            'phone.required' => 'Please enter your Phone',
            'message.required' => 'Please enter your Message'
        ]);

        $this->booking->insertBooking([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'time' => $request->get('time'),
            'date' => Carbon::createFromFormat('m/d/Y', $request->get('date'))->format('Y/m/d'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message'),
            'user_id' => session()->get('id') == null ? 1 : session()->get('id')
        ]);
        return redirect()->route('admin.booking.index');
    }
    public function update($id){
        $booking=$this->booking->getBooking($id);
        if($booking){
            return view('admin.booking.update',compact('booking'));
        }
        return redirect()->route('admin.booking.index');
    }
    public function postUpdate(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'time' => 'required',
            'date' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ],[
            'first_name.required' => 'Please enter your First Name',
            'last_name.required' => 'Please enter your Last Name',
            'time.required' => 'Please enter your Time',
            'date.required' => 'Please enter your Date',
            'phone.required' => 'Please enter your Phone',
            'message.required' => 'Please enter your Message'
        ]);
        $this->booking->updateBooking($request->all(),$request->get('id'));
        return redirect()->route('admin.booking.index');
    }
    public function delete($id){
        $this->booking->deleteBooking($id);
        return redirect()->route('admin.booking.index');
    }
}
