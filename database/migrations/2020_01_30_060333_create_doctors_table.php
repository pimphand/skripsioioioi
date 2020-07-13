<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('doctors', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->text('nama');
      $table->integer('user')->nullable();
      $table->integer('str');
      $table->text('title');
      $table->text('place');
      $table->text('address');
      $table->text('graduated');
      $table->string('img')->nullable();
      $table->text('active')->nullable();
      $table->text('unactivated')->nullable();
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
    Schema::dropIfExists('doctors');
  }
}
