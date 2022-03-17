<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollQuestionUserTable extends Migration
{
    public function up()
    {
        Schema::create('poll_question_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_question_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('user_id')
                ->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poll_question_user');
    }
}
