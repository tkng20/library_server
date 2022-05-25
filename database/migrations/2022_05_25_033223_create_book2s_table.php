<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBook2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book2s', function (Blueprint $table) {
            $table->id();
            $table->string('tenSach');
            $table->string('tacGia');
            $table->unsignedBigInteger('categories_id');
            $table->string('soLuong');
            $table->string('soTrang');
            $table->date('ngayXB');
            $table->string('moTa');

            $table->index('categories_id');

            $table->foreign('categories_id')->references('id')
            ->on('categories')
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
        Schema::dropIfExists('book2s');
    }
}
