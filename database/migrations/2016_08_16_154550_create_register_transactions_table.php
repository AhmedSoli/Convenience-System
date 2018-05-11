<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->index();
            $table->integer('reciever_id')->index();
            $table->decimal('amount', 5, 2);
            $table->string('note');
            $table->string('booking_number')->nullable();
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('reciever_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('register_transactions');
    }
}
