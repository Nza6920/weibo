<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('follower_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
