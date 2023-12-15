<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name',500)->nullable(false)->unique();
            $table->string('item_image',500)->nullable(false);
            $table->longText('item_details')->nullable(false);
            $table->integer('item_priority')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->string('currency','10')->nullable(false)->default("INR");
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
        //
    }
}