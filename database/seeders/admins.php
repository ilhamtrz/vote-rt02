<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // Gunakan model Admin

class admins extends Seeder
{
    public function run(): void
    {
        // Membuat seeder untuk admin
        admin::create([
            'nama' => 'admin',
            'NoReg' => 987,
        ]);
    }
}
