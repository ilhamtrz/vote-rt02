<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'kepala_keluarga'   =>  'admin',
            'no_kk'             =>  '9999999999999999',
            'password'          =>  bcrypt('vote-rt')
        ]);

        $admin->assignRole('admin');
    }
}
