<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'owner',
            'password' => Hash::make('password123'),
            'type' => 'owner',
            'parent_id' => null,
            'downline_share' => 100,
            'is_active' => true,
            'phone' => null,
            'reference' => 'System Generated',
            'notes' => 'Primary owner account',
        ]);
    }
}
