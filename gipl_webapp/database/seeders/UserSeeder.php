<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'surname' => '',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => bcrypt('qwerty'),
            'role' => 'admin',
        ]);

        User::factory(99)->create();
    }
}
