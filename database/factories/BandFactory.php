<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\Catalog\Models\Band;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BandFactory extends Factory
{
    protected $model = Band::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::random(10),
            'genre' => Str::random(10),
            'created_at' => date("Y-m-d H:i:s"),
            'breakdown_at' => date("Y-m-d H:i:s")
        ];
    }
}
