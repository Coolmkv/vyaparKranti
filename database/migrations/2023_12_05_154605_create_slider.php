<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->id();
            $table->string('image',500)->nullable(false);
            $table->string('heading_top',500)->nullable(true)->default(null);
            $table->string('heading_middle',500)->nullable(true)->default(null);
            $table->string('heading_bottom',500)->nullable(true)->default(null);
            $table->enum('slide_status',["live","disabled"])->nullable(false)->default("disabled");
            $table->integer('slide_sorting')->nullable(false)->default("1")->index("slide_sorting_index");
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
        Schema::dropIfExists('slider');
    }
}

