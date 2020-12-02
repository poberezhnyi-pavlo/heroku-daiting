<?php

use App\Models\Man;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMenTable
 */
class CreateMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(Man::tableName(), static function (Blueprint $table) {
            $table->id();
            $table->float('credits')->default(0);
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('post_index', 10);
            $table->date('birth_day');
            $table->unsignedDecimal('height', 5, 2);
            $table->unsignedDecimal('weight', 5, 2);
            $table->enum('eye_color', Man::EYE_COLORS);
            $table->enum('hair_color', Man::HAIR_COLORS);
            $table->string('about_myself');
            $table->string('interests');
            $table->string('education');
            $table->string('job');
            $table->string('creed');
            $table->string('bad_habits');
            $table->string('langs')->nullable();
            $table->unsignedInteger('age_of_woman');
            $table->string('about_woman');
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
        Schema::dropIfExists(Man::tableName());
    }
}
