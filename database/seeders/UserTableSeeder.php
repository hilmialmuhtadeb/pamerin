<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = collect([
            [
                'name' => 'Hilmi Almuhtade Billah',
                'email' => 'hilmialmuhtadeb@gmail.com',
                'phone' => '089601628845',
                'password' => Hash::make('password'),
                'type' => 1,
            ],
            [
                'name' => 'Rachita Amelia',
                'email' => 'rachitaamelia@gmail.com',
                'phone' => '089673828481',
                'password' => Hash::make('password'),
                'type' => 3,
            ],
            [
                'name' => 'Fiersa Besari',
                'email' => 'fiersabesari@gmail.com',
                'phone' => '08394453493',
                'password' => Hash::make('password'),
                'type' => 2,
            ],
        ]);

        $user->each(function($u) {
            User::create([
                'name' => $u['name'],
                'email' => $u['email'],
                'phone' => $u['phone'],
                'password' => $u['password'],
                'type' => $u['type'],
            ]);
        });
    }
}
