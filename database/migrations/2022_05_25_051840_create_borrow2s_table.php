<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrow2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow2s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book2_id');
            $table->date('date_borrow');
            $table->date('date_return')->nullable();
            $table->string('status')->nullable()->default(0);

            $table->index('user_id');
            $table->index('book_id');

            $table->foreign('book_id')->references('id')
            ->on('book2s')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow2s');
    }
}
