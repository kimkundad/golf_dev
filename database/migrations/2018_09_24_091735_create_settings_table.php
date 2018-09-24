<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('compony')->nullable();
            $table->text('address')->nullable();
            $table->text('title_company')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('facebook_img')->nullable();
            $table->text('fb_title')->nullable();
            $table->text('fb_detail')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
