<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypesToLeaguesTable extends Migration
{
    public function up()
    {
        Schema::table('leagues', function (Blueprint $table) {
            $table->string('type')->nullable();
        });
    }

    public function down()
    {
        Schema::table('leagues', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
