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
                'category' => Setting::CATEGORY_PRICE,
                'fieldType' => Setting::FIELD_INPUT,
            ],
            [
                'name' => 'Message cost up to 100 symbols',
                'key' => 'messageCost1',
                'value' => '2',
                'append' => '$',
                'description' => 'Message cost 0-100 symbols for men. Will be charge during send every message',
                'category' => Setting::CATEGORY_PRICE,
                'fieldType' => Setting::FIELD_INPUT,
            ],
            [
                'name' => 'Message cost 100-300 symbols',
                'key' => 'messageCost2',
                'value' => '3',
                'append' => '$',
                'description' => 'Message cost 100-300 symbols for men. Will be charge during send every message',
                'category' => Setting::CATEGORY_PRICE,
                'fieldType' => Setting::FIELD_INPUT,
            ],
            [
                'name' => 'Message cost over 300 symbols',
                'key' => 'messageCost3',
                'value' => '3',
                'append' => '$',
                'description' => 'Message cost over 300 symbols for men. Will be charge during send every message',
                'category' => Setting::CATEGORY_PRICE,
                'fieldType' => Setting::FIELD_INPUT,
            ],
        ]);
    }
}
