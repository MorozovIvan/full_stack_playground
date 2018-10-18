<?php

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
            'title' => 'Communication skills',
        ]);
        Feature::create([
            'title' => 'Engineering skills',
        ]);
        Feature::create([
            'title' => 'Time management',
            'dynamic' => true,
        ]);
        Feature::create([
            'title' => 'Knowledge of languages',
        ]);
    }
}
