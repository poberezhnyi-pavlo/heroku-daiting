<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            [
                'name' => 'Video cost per minute',
                'key' => 'videoCostPerMinute',
                'value' => '1',
                'append' => '$',
                'description' => 'Video cost per minute for men. Will be charge during video watch per minute',
            ],
        ]);
    }
}
