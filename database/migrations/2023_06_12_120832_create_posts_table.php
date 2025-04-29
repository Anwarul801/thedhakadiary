<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('video_duration')->nullable();
            $table->string('video_id')->nullable();
            $table->text('shoulder')->nullable();
            $table->integer('author_id')->nullable();
            $table->longText('news_details')->nullable();
            $table->integer('media_id')->nullable();
            $table->text('tags')->nullable();
            $table->string('publishing_date')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('status')->default('Draft');
            $table->integer('latest_news')->default(0);
            $table->integer('breaking_news')->default(0);
            $table->string('source')->nullable();
            $table->integer('order')->nullable();
            $table->string('language')->nullable()->default('bn');
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
        Schema::dropIfExists('posts');
    }
}
