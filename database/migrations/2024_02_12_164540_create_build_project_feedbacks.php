<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildProjectFeedbacks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_project_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable(false);
            $table->string('company',255)->nullable(false);
            $table->string('email',100)->nullable(false)->index("email_index_build_project_fb");
            $table->string('phone_number',20)->nullable(false)->index("phone_number_index");
            $table->text('description')->nullable(false);
            $table->text('selected_options')->nullable(false);
            $table->integer('status')->nullable(false)->default(1);
            $table->string('ip',64)->nullable(true);
            $table->string('user_agent',255)->nullable(true);
            $table->bigInteger("created_by")->nullable(true)->default(NULL);
            $table->bigInteger("updated_by")->nullable(true)->default(NULL);
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
        //Schema::dropIfExists('build_project_feedbacks');
    }
}
