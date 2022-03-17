<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEndDateToSportGamesTable extends Migration
{
    public function up()
    {
        Schema::table('sport_games', function (Blueprint $table) {
            $table->dateTime('end_date')->nullable()->index();
        });
    }

    public function down()
    {
        Schema::table('sport_games', function (Blueprint $table) {
            $table->dropColumn('end_date');
        });
    }
}
