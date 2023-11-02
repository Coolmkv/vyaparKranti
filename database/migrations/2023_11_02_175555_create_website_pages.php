<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitePages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websitePages', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('route_name',255)->nullable(true)->default(NULL);
            $table->integer('status')->nullable(true)->default(1);
            $table->bigInteger("created_by")->default(NULL);
            $table->bigInteger("updated_by")->default(NULL);
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
        Schema::dropIfExists('website_pages');
    }
}
