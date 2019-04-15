<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('phone_number')->nullable();
            $table->string('email');
            $table->string('fonction')->nullable();
            $table->string('service')->nullable();
            $table->string('civility')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('society_id')->unsigned();

            $table->foreign('society_id')->references('id')->on('gestioncontacts.society');

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
        Schema::dropIfExists('contact');
    }
}
