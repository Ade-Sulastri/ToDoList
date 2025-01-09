<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use WithoutModelEvents;
    public function run(): void
    {
        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'adminofficcial@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
