<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateGiftTranslationsTable
 */
class CreateGiftTranslationsTable extends Migration
{
    private const TABLE = 'gift_translations';

    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gift_id');
            $table->string('locale')->index();

            $table->text('title')->nullable();
            $table->longText('description')->nullable();

            $table->unique(['gift_id', 'locale']);
            $table->foreign('gift_id')
                ->references('id')
                ->on('gifts')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
