<?php

use App\Models\Woman;
use Illuminate\Database\Seeder;

/**
 * Class WomanSeeder
 */
class WomanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Woman::class, 20)->create();
    }
}
