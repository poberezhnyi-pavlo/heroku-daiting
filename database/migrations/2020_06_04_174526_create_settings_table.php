<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('settings', static function (Blueprint $table) {
            $table->id();
            $table->string('key', 25);
            $table->string('name', 40);
            $table->longText('value');
            $table->string('append', 20);
            $table->longText('description');
            $table->enum('category', Setting::CATEGORIES)
                ->default(Setting::CATEGORY_MAIN);
            $table->enum('fieldType', Setting::FIELDS)
                ->default(Setting::FIELD_INPUT);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
}
