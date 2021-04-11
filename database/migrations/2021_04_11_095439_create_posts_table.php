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
            $table->text('mensaje');
            $table->boolean('moderado')->default(false);

            $table->foreignId('foro_id');
            $table->foreign('foro_id')
            ->references('id')->on('foros')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('tema_id');
            $table->foreign('tema_id')
            ->references('id')->on('temas')
            ->onDelete('cascade')->onUpdate('cascade');

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
