<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name',500)->nullable(false);
            $table->string('customer_email',500)->nullable(false)->default(null)->index("customer_email_index");
            $table->string('customer_mobile',20)->nullable(false)->default(null)->index("customer_mobile_index");
            $table->dateTime("booking_date_time")->nullable(false)->default(null)->index("booking_date_index");
            $table->integer('guest_count')->nullable(false);
            $table->enum('booking_status',["booking_received","booking_confirmed","booking_rejected"])->nullable(false)->default("booking_received");
            $table->longText('rejection_reason')->nullable(true);
            $table->tinyInteger('status')->default('1')->nullable(false);
            $table->bigInteger("created_by")->nullable(true);
            $table->bigInteger("updated_by")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

