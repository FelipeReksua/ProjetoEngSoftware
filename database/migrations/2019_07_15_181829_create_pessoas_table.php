<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();;
            $table->string('city');
            $table->string('state');
            $table->string('employee');
            $table->string('job_title')->nullable();
            $table->string('cpf');
            $table->string('phone')->nullable();
            $table->integer('childrens');
            $table->integer('pontos')->default(0);;
            $table->string('social_project');
            $table->decimal('renda', 12, 2)->default(0,00);
            $table->boolean('contemplado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
