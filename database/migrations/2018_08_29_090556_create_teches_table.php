<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tech_fname')->nullable();
            $table->string('tech_lname')->nullable();
            $table->string('tech_phone')->nullable();
            $table->string('tech_email')->nullable();
            $table->string('tech_image')->nullable();
            $table->string('tumbon')->nullable();
            $table->string('district')->nullable();
            $table->integer('province_id')->default('0');
            $table->string('zip_code')->nullable();
            $table->text('tech_detail')->nullable();
            $table->longText('tech_project')->nullable();
            $table->integer('tech_status')->default('0');
            $table->integer('tech_view')->default('0');
            $table->integer('tech_rating')->default('0');
            $table->integer('tech_status_show')->default('0');
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
        Schema::dropIfExists('teches');
    }
}
