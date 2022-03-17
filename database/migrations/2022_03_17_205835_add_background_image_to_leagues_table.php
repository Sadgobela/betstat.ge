<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackgroundImageToLeaguesTable extends Migration
{
    public function up()
    {
        Schema::table('leagues', function (Blueprint $table) {
            $table->string('background_image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('leagues', function (Blueprint $table) {
            $table->dropColumn('background_image');
        });
    }
}
