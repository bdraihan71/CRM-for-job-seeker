<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Raihan Farhad', 'email' => 'bdraihan71@gmail.com', 'password' => 'raihan007'],
            ['name' => 'Nilima Khondoker', 'email' => 'nilima@gmail.com', 'password' => 'nilima007'],
            ['name' => 'Jihan Tarif', 'email' => 'jihan@gmail.com', 'password' => 'jihan007'],
            ['name' => 'Falaq Afreen', 'email' => 'falq@gmail.com', 'password' => 'falaq007']
            
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                ['name' => $user['name'], 'password' => bcrypt($user['password'])]
            );
        }

    }
}
