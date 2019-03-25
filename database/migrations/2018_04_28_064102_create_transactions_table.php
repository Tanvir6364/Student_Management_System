<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transact_id');
            $table->dateTime('transact_date');
            $table->string('remark',50)->nullable();
            $table->string('description',200)->nullable();
            $table->float('paid',8,2);
            $table->integer('fee_id')->unsigned();
            $table->foreign('fee_id')->references('fee_id')->on('fees');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('s_fee_id')->unsigned();
            $table->foreign('s_fee_id')->references('s_fee_id')->on('studentfees');
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
        Schema::dropIfExists('transactions');
    }
}
