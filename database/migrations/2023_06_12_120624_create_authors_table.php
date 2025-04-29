<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn')->nullable();
            $table->string('name_en')->nullable();
            $table->string('email')->nullable();
            $table->string('profession')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('status')->default('Active');
            $table->text('details')->nullable();
            $table->integer('order')->nullable();
            $table->integer('type_id');
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
        Schema::dropIfExists('authors');
    }
}
