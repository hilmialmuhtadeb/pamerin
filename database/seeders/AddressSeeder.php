<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = collect([
            [
                'user_id' => 1,
                'street' => 'Pondok Benowo Indah T-21',
                'city' => 'Surabaya',
                'region' => 'Jawa Timur',
                'zipcode' => '60197',
            ],
            [
                'user_id' => 2,
                'street' => 'Jl. Pekon Balak no.5',
                'city' => 'Lampung Barat',
                'region' => 'Lampung',
                'zipcode' => '34881',
            ],
            [
                'user_id' => 3,
                'street' => 'Jl. Pondok Benowo Indah T-22',
                'city' => 'Surabaya',
                'region' => 'Jawa Timur',
                'zipcode' => '60197',
            ],
        ]);

        $addresses->each(function($u) {
            Address::create([
                'user_id' => $u['user_id'],
                'street' => $u['street'],
                'city' => $u['city'],
                'region' => $u['region'],
                'zipcode' => $u['zipcode'],
            ]);
        });
    }
}
