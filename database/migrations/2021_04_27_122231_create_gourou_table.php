<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGourouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*  Schema::table('gourou', function (Blueprint $table) {
            //
        }); */
        Schema::create('voyant', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name', 255);
            $table->string('biography', 1000);
            $table->integer('note');

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
        Schema::drop('voyant');
    }
}
