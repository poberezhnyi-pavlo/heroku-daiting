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
    public function up(): void
    {
        Schema::create('gallery_images', static function (Blueprint $table) {
            $table->id();
            $table->string('uri');
            $table->unsignedInteger('order')->nullable();
            $table->unsignedBigInteger('woman_id');
            $table->foreign('woman_id')
                ->references('id')
                ->on('women')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
}
