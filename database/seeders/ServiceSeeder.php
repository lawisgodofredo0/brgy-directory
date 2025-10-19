<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Official;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             // Attach a service to the secretary if exists
        $secretary = Official::where('position', 'Barangay Secretary')->first();

        Service::create([
            'name' => 'Barangay Clearance',
            'description' => 'Used for employment, studies, and other local requirements.',
            'official_id' => $secretary ? $secretary->id : null,
            'office_hours' => 'Mon-Fri 8:00 AM - 12:00 NN'
        ]);

        Service::create([
            'name' => 'Youth Program Assistance',
            'description' => 'Assistance for youth scholarships and programs.',
            'official_id' => null,
            'office_hours' => 'By appointment'
        ]);
    }
}
