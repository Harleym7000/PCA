<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'start_date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_date' => $this->faker->date(),
            'end_time' => $this->faker->time(),
            'venue' => $this->faker->name(),
            'admission' => '0.00',
            'spaces_left' => '50',
            'image' => 'pcaLogo.png',
            'managed_by' => 'PCA',
        ];
    }
}
