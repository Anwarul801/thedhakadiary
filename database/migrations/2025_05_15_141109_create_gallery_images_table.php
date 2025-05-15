<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->integer('image_gallery_id');
            $table->string('caption')->nullable();
            $table->string('caption_en')->nullable();
            $table->string('photographer')->nullable();
            $table->string('photographer_en')->nullable();
            $table->string('date_time_image')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('Active')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('gallery_images');
    }
}
