<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    User::create([
        'name' => 'Yassmine',
        'email' => 'admin@Yassmine.com',
        'password' => bcrypt('123456789'),
        'status' => 'Admin', 
        'reputation_score' => 0,
        'is_banned' => false,
    ]);
}
}
