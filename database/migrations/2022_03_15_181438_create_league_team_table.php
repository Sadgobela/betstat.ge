<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueTeamTable extends Migration
{
    public function up()
    {
        Schema::create('league_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('team_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->index(['league_id', 'team_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('league_team');
    }
}
