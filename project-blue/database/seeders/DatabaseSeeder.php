<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $projects = Project::factory(10)->recycle($users)->create();
        
        Task::factory()->create([
            'project_id' => $projects->random()->id,
            'status' => 'completado'
        ]);
        Task::factory()->create([
            'project_id' => $projects->random()->id,
            'status' => 'pendiente'
        ]);
        Task::factory()->create([
            'project_id' => $projects->random()->id,
            'status' => 'cancelado'
        ]);
        
        foreach ($projects as $project) {
            ProjectUser::factory()->create([
                'project_id' => $project->id,
                'user_id' => $users->random()->id
            ]);
        }
    }
}
