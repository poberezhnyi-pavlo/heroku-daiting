<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Class PageSeeder
 */
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Page::class, 2)
            ->create();
    }
}
