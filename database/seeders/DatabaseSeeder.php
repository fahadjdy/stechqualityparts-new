<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Fahad Jadiya',
            'password' => bcrypt('Fahad123@'),
            'email' => 'fahadjdy12@gmail.com',
        ]);

        \App\Models\CompanyProfile::create([
            'user_id' => $user->id,
            'name' => 'My Awesome Company',
            'email' => 'info@company.com',
            'contact' => '1234567890',
            'city' => 'Surat',
            'state' => 'Gujarat',
            'location' => 'Main Street, India',
            'about' => 'Welcome to our company profile.',
        ]);
    }
}
