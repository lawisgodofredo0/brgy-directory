<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Official;
class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Official::create([
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'position' => 'Barangay Captain',
            'phone' => '09171234567',
            'email' => 'captain@balintawak.ph',
            'responsibilities' => 'Oversees barangay operations and governance.'
        ]);

        Official::create([
            'first_name' => 'Maria',
            'last_name' => 'Santos',
            'position' => 'Barangay Secretary',
            'phone' => '09179876543',
            'email' => 'secretary@balintawak.ph',
            'responsibilities' => 'Handles barangay clearances and records.'
        ]);
    }
}
