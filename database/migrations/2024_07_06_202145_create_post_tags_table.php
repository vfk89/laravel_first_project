<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            // Убедитесь, что используемые индексы ссылаются на существующие столбцы
            $table->index(['post_id']);
            $table->index(['tag_id']);
            $table->foreign('post_id', 'post_tag_post_fk')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id', 'post_tag_tag_fk')->references('id')->on('tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};
