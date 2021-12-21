<?php

namespace Database\Factories;

use App\Models\Exhibition;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExhibitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exhibition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 2),
            'name' => $this->faker->sentence(2),
            'slug' => Str::slug($this->faker->sentence(2)),
            'date' => $this->faker->date('Y-m-d'),
            'stages' => 1,
            'start' => $this->faker->time('H:i:s'),
            'end' => $this->faker->time('H:i:s'),
            'price' => $this->faker->numberBetween(50000, 200000),
            'description' => $this->faker->paragraph(5),
            'thumbnail' => '/img/dummy/pameran.jpg',
        ];
    }
}
