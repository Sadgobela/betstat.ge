<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('poll_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poll_questions');
    }
}
