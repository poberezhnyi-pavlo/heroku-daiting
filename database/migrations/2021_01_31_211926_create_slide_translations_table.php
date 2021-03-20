<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSlideTranslationsTable
 */
class CreateSlideTranslationsTable extends Migration
{
    private const TABLE = 'slide_translations';

    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('body')->nullable();

            $table->unsignedBigInteger('slide_id');
            $table->string('locale')->index();

            $table->unique(['slide_id', 'locale']);
            $table->foreign('slide_id')
                ->references('id')
                ->on('slides')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
