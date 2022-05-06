<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\Catalog\Models\Membership;
use App\Domain\Catalog\Models\Musician;
use App\Domain\Catalog\Models\Band;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MembershipFactory extends Factory
{
    protected $model = Membership::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'musician_id' => Musician::inRandomOrder()->first()->id,
            'band_id' => Band::inRandomOrder()->first()->id
        ];
    }
}
