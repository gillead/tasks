<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTaskStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_task_stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->date('date');
            $table->timestamps();
            $table->foreign('task_id')->references('id')->on('daily_tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_task_stats');
    }
}
