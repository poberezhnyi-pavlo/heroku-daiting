<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('videos', static function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order')->nullable();
            $table->string('youtube_video_id');
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
        Schema::table('videos', static function (Blueprint $table) {
            Schema::dropIfExists('videos');
        });
    }
}
