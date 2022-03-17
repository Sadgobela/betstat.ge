<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('poll_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_question_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('answer')->nullable();
            $table->integer('count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poll_answers');
    }
}
