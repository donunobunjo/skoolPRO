<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('RollNumber',15);
            $table->string('FullName',30);
            $table->string('Session',15);
            $table->string('Term',15);
            $table->string('Class',15);
            //$table->string('Category',20);
            $table->string('Subject',20);
            $table->tinyInteger('FirstCA')->unsigned()->default(0);
            $table->tinyInteger('SecondCA')->unsigned()->default(0);
            $table->tinyInteger('Exam')->unsigned()->default(0);
            $table->Integer('Total')->unsigned()->default(0);
            $table->Integer('GrandTotal')->unsigned()->default(0);
            $table->Integer('Average')->unsigned()->default(0);
            $table->Integer('GrandAverage')->unsigned()->default(0);
            $table->Integer('Position')->unsigned()->default(0);
            $table->Integer('GrandPosition')->unsigned()->default(0);
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
        Schema::dropIfExists('scores');
    }
}
