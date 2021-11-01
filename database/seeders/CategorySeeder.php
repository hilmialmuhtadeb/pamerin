<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = collect([
            [
                'name' => 'Lukisan',
                'slug' => 'lukisan',
            ],
            [
                'name' => 'Fotografi',
                'slug' => 'fotografi',
            ],
            [
                'name' => 'Kaligrafi',
                'slug' => 'kaligrafi',
            ],
        ]);

        $category->each(function($e) {
            Category::create([
                'name' => $e['name'],
                'slug' => $e['slug'],
            ]);
        });
    }
}
