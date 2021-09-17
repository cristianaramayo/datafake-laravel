<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();

            $table->BigInteger('user_id')->unsigned();
            #$table->BigInteger('category_id')->unsigned();

            $table->string('title');
            //$table->string('slug')->unique();

            $table->text('code');
            $table->text('about');
            $table->boolean('free')->default(1);
            //$table->string('archivo');//url donde se encuentra guardado
            $table->BigInteger('num_download')->unsigned()->default(0);//numero de descargas del dataset

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('datasets');
    }
}
