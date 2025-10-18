<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Task;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            
            'name' => fake()->name(),
            'description' => fake()->text(),
            'status' => fake()->randomElement(["completado","pendiente","cancelado"]),
            'due_date' => fake()->date(),
        ];
    }
}
