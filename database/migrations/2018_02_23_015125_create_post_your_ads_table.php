<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostYourAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_your_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeOfAd');
            $table->string('adTitle');
            $table->string('adImage');
            $table->string('ad_slug')->unique();
            $table->integer('status');
            $table->longtext('describeAd');
            $table->string('email');
            $table->integer('user_id');
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
        Schema::dropIfExists('post_your_ads');
    }
}
