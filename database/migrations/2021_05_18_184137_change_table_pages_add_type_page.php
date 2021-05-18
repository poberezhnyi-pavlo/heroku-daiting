<?php

use App\Models\Page;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTablePagesAddTypePage extends Migration
{
    public function up(): void
    {
        Schema::table('pages', static function (Blueprint $table) {
            $table
                ->enum('type', Page::PAGES_TYPE_LIST)->after('published')->unique();
        });
    }

    public function down(): void
    {
        Schema::table('pages', static function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
