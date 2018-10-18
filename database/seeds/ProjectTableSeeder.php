<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 15) as $projectNumber) {
            factory(Project::class)->create([
                'title' => "ПРОЕКТ $projectNumber"
            ]);
        }
    }
}
