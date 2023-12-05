<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\BookingModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class BookingsController extends Controller
{
    public function submitBooking(BookingRequest $bookingRequest){
        try{
            $newBooking = new BookingModel();
            $newBooking->{BookingModel::CUSTOMER_NAME} = trim($bookingRequest->input(BookingModel::CUSTOMER_NAME));
            $newBooking->{BookingModel::CUSTOMER_EMAIL} = trim($bookingRequest->input(BookingModel::CUSTOMER_EMAIL));
            $newBooking->{BookingModel::CUSTOMER_MOBILE} = trim($bookingRequest->input(BookingModel::CUSTOMER_MOBILE));
            $newBooking->{BookingModel::BOOKING_DATE_TIME} = trim($bookingRequest->date(BookingModel::BOOKING_DATE_TIME));
            $newBooking->{BookingModel::GUEST_COUNT} = trim($bookingRequest->input(BookingModel::GUEST_COUNT));
            $newBooking->{BookingModel::STATUS} = 1;
            $newBooking->save();
            return response()->json(["status"=>true,"message"=>"Booking received we will call you for confirmation.","data"=>null]);
        
        }catch(Exception $exception){
            Log::error(json_encode(["message"=>$exception->getMessage(),"getTraceAsString"=>$exception->getTraceAsString()]));
            return response()->json(["status"=>false,"message"=>"Something went wrong.","data"=>null]);
        
        }
        
    }

    public function bookingsData(){
        $dateNow = strtotime(Carbon::now());
        $query = BookingModel::select(BookingModel::CUSTOMER_NAME,
        BookingModel::ID,
        BookingModel::CUSTOMER_EMAIL,
        BookingModel::CUSTOMER_MOBILE,
        DB::raw(" DATE_FORMAT(".BookingModel::BOOKING_DATE_TIME.", '%W %M %e %Y %r') as booking_date_time"),
        BookingModel::GUEST_COUNT,
        BookingModel::BOOKING_STATUS,
        BookingModel::REJECTION_REASON)
        ->where(BookingModel::STATUS,1);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('booking_status',function($row){
                return BookingModel::BOOKING_STATUSES[$row->{BookingModel::BOOKING_STATUS}];
            })
            ->addColumn('action', function ($row) use($dateNow){
                $btn_reject = ' <a   href="javascript:void(0)" onclick="booking('.$row->{BookingModel::ID}.',\'reject\')" class="btn btn-danger btn-sm">Reject</a>';
                $btn_confirm = ' <a   href="javascript:void(0)" onclick="booking('.$row->{BookingModel::ID}.',\'confirm\')" class="btn btn-primary btn-sm">Confirm</a>';
                $bookingDate = strtotime($row->{BookingModel::BOOKING_DATE_TIME});
                if($row->{BookingModel::BOOKING_STATUS}=="booking_received" && $dateNow<=$bookingDate){
                    return $btn_reject.$btn_confirm;
                }
                
                if($row->{BookingModel::BOOKING_STATUS}=="booking_received" && $dateNow>$bookingDate){
                    return $btn_reject;
                }
                if($row->{BookingModel::BOOKING_STATUS}=="booking_confirmed" && $dateNow<=$bookingDate){
                    return $btn_reject;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function bookingsPage(){
        return view("Dashboard.Pages.bookingAdminPage");
    }
}

