<?php

namespace Database\Factories;

use App\Models\Artwork;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artwork::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 3),
            'user_id' => 3,
            'name' => $this->faker->sentence(3),
            'slug' => Str::slug($this->faker->sentence(3)),
            'thumbnail' => '/img/dummy/artwork.jpg',
            'size' => '40 x 60 cm',
            'media' => $this->faker->sentence(2),
            'year' => $this->faker->year('now'),
            'description' => $this->faker->paragraph(5),
            'isReady' => false,
        ];
    }
}
