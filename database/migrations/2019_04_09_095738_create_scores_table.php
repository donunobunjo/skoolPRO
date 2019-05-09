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
            $table->Integer('FirstCA')->unsigned()->nullable()->default(null);
            $table->Integer('SecondCA')->unsigned()->nullable()->default(null);
            $table->Integer('Exam')->unsigned()->nullable()->default(null);
            $table->Integer('Total')->unsigned()->nullable()->default(null);
            $table->Integer('GrandTotal')->unsigned()->nullable()->default(null);
            $table->Integer('Average')->unsigned()->nullable()->default(null);
            $table->Integer('GrandAverage')->unsigned()->nullable()->default(null);
            $table->Integer('Position')->unsigned()->nullable()->default(null);
            $table->Integer('GrandPosition')->unsigned()->nullable()->default(null);
            $table->unique(['RollNumber','Session', 'Term', 'Class', 'Subject']);
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
