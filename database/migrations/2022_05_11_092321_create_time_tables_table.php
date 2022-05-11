<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('time_tables', function (Blueprint $table) {
        $table->id();
        $table->foreignId('faculty_id');
        $table->foreignId('subject_id');
        // $table->date('date');
        // $table->foreignId('term_id');
        $table->time('session_start_time');
        $table->time('session_stop_time');
        $table->string('duration');
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
        Schema::dropIfExists('time_tables');
    }
};
