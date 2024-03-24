<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
                        'name' => 'Admin User',
            'email' => 'huda@fic15.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '12345678',
        ]);

        // Seeder Profile Clinic 
          \App\Models\ProfileClinic::factory()->create([
            'name' => 'Klinik Ajaib',
            'address' => 'Jl Bantul',
            'phone' => '1234567890',
            'email' => 'drhuda@klinik.com',
            'doctor_name' => 'Huda',
            'unique_code' => '123456',
        ]);
        
        // call Doctor Seeder 
        $this->call(DoctorSeeder::class);
        
    }
}
