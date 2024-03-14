<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        if($this->checkNotExists()){
            Schema::create('websitePages', function (Blueprint $table) {
                $table->integerIncrements('id');
                $table->string('route_name',255)->nullable(true)->default(NULL);
                $table->integer('status')->nullable(true)->default(1);
                $table->bigInteger("created_by")->nullable(true)->default(NULL);
                $table->bigInteger("updated_by")->nullable(true)->default(NULL);
                $table->timestamps();
            });
        }
        
    }

    public function checkNotExists(){
        try{
           DB::table("websitePages")->first();
           return false;
        }catch(Exception $exception){
            report($exception);
            return true;
        }
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
