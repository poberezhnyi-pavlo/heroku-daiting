<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
         $this->call(UserSeeder::class);
         $this->call(SettingSeeder::class);
//         $this->call(WomanSeeder::class);
         $this->call(PageSeeder::class);
    }
}
