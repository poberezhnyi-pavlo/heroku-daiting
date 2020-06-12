<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => 'root',
            'email' => 'trolikua@gmail.com',
            'password' => '$2y$10$xPSmfkCQwclANNAzvD.8fOBTu0vmfa6Pb4k3Szf0MsHNTfy5X/WEC',
            'role' => User::ROLE_ADMIN,
            'status' => User::STATUS_ACTIVE,
        ]);

        factory(User::class, 10)->create();
    }
}
