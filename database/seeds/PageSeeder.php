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
        foreach (Page::PAGES_TYPE_LIST as $type) {
            factory(Page::class)->state($type)->create();
        }
    }
}
