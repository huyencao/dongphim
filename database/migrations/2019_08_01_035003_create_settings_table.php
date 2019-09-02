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
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_hotline')->nullable();
            $table->string('site_email')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_description');
            $table->text('meta_keyword')->nullable();
            $table->string('site_coppyright')->nullable();
            $table->text('code_maps')->nullable();
            $table->string('google_analytics')->nullable();
            $table->string('site_fanpage')->nullable();
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
