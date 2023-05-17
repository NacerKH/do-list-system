<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> $this->faker->title(),
            'content' =>$this->faker->text(),
            'priority' => rand(1,5), 
            'date_of_completion' => $this->faker->dateTime(),
           
        ];
    }
}
