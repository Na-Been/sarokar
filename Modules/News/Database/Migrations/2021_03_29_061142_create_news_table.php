<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('highlight_text')->nullable();
            $table->integer('highlight_news')->default(0);
            $table->string('sub_heading')->nullable();
            $table->string('slug')->unique();
            $table->string('feature_image')->nullable();
            $table->string('author_image')->nullable();
            $table->string('posted_by');
            $table->longText('description');
            $table->enum('status', [1, 0])->default(1);

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
