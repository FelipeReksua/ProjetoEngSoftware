<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContempladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contemplado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('data')->nullable();
            $table->integer('pessoa_id')->unsigned()->nullable();
            $table->text('beneficio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contemplado');
    }
}
