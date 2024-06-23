<?php

namespace Database\Seeders;

use App\Models\JobModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $job = new JobModel();
        // $job-> employer_id = '1';
        // $job-> title = 'titulo de prueba 3';
        // $job->salary = '$5,000';
        // $job->save();
        JobModel::factory(50)->create();
    }
}
