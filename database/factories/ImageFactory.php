<?php

namespace Database\Factories;

use App\Enums\RolesEnum;
use App\Enums\ShowScopeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->title(),
            "scope" => ShowScopeEnum::GLOBAL->value,
        ];
    }
}
