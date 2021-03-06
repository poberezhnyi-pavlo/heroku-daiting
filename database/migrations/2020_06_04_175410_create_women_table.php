<?php

use App\Models\Woman;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWomenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(Woman::tableName(), static function (Blueprint $table) {
            $table->id();
            $table->date('birth_date')->nullable();
            $table->integer('amount_of_children', false, true);
            $table->integer('height', false, true);
            $table->float('weight', 5, 2, true);
            $table->enum('eye_color', Woman::EYE_COLORS);
            $table->enum('hair_color', Woman::HAIR_COLORS);
            $table->text('education')->nullable();
            $table->string('langs')->nullable();
            $table->string('job')->nullable();
            $table->text('travel_countries')->nullable();
            $table->text('vises')->nullable();
            $table->string('creed')->nullable()->comment('church');
            $table->text('bad_habits')->nullable();
            $table->text('ideal_man')->nullable();
            $table->text('about_myself')->nullable();
            $table->string('city')->nullable();
            $table->boolean('is_show_in_gallery')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(Woman::tableName());
    }
}
