<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages = [
            ['stage_name' => 'Lead'],
            ['stage_name' => 'Applied'],
            ['stage_name' => 'Interview'],
            ['stage_name' => 'Coding'],
            ['stage_name' => 'Offer ']
            
        ];

        foreach ($stages as $stage) {
            Stage::updateOrCreate(
                ['stage_name' => $stage['stage_name']]
            );
        }
    }
}
