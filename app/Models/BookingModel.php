<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = "bookings";

    const ID = "id";
    const CUSTOMER_NAME = "customer_name";
    const CUSTOMER_EMAIL = "customer_email";
    const CUSTOMER_MOBILE = "customer_mobile";
    const BOOKING_DATE_TIME = "booking_date_time";
    const GUEST_COUNT = "guest_count";
    const BOOKING_STATUS = "booking_status";
    const REJECTION_REASON = "rejection_reason";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    //ENUM('booking_received', 'booking_confirmed', 'booking_rejected')
    const BOOKING_STATUSES = ['booking_received'=>"Received",
     'booking_confirmed'=>"Confirmed", 'booking_rejected'=>"Rejected"];
}
