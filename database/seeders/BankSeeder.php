<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = collect([
            [
                'user_id' => 1,
                'name' => 'Bank BRI',
                'number' => '303030282638239',
                'owner' => 'Hilmi Almuhtade Billah',
            ],
            [
                'user_id' => 2,
                'name' => 'Bank Mandiri',
                'number' => '72373929272633',
                'owner' => 'Rachita Amelia',
            ],
            [
                'user_id' => 3,
                'name' => 'Bank Mandiri',
                'number' => '72373929275433',
                'owner' => 'Fiersa Besari',
            ],
        ]);

        $banks->each(function($u) {
            Bank::create([
                'user_id' => $u['user_id'],
                'name' => $u['name'],
                'number' => $u['number'],
                'owner' => $u['owner'],
            ]);
        });
    }
}
