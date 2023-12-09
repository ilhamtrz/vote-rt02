<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'kepala_keluarga'   =>  'Muji Sarwono',
            'no_kk'             =>  '3374101412058102'
        ]);
        $user1->assignRole('user');

        $user2 = User::create([
            'kepala_keluarga'   =>  'Agung Wibowo, S.T',
            'no_kk'             =>  '3374102408060005'
        ]);
        $user2->assignRole('user');

        $user3 = User::create([
            'kepala_keluarga'   =>  'Kunto Pursono, DRS',
            'no_kk'             =>  '3374101312057'
        ]);
        $user3->assignRole('user');

        $user4 = User::create([
            'kepala_keluarga'   =>  'Fauzan Kusuma Jati',
            'no_kk'             =>  '3374102811180009'
        ]);
        $user4->assignRole('user');

        $user5 = User::create([
            'kepala_keluarga'   =>  'Tri Hermawan, Ir',
            'no_kk'             =>  '3374101412059713'
        ]);
        $user5->assignRole('user');

        $user6 = User::create([
            'kepala_keluarga'   =>  'Saliman',
            'no_kk'             =>  '115010/98/01658'
        ]);
        $user6->assignRole('user');

        $user7 = User::create([
            'kepala_keluarga'   =>  'Haris Ma`ruf, S.Pd',
            'no_kk'             =>  '3374071212052453'
        ]);
        $user7->assignRole('user');

        $user8 = User::create([
            'kepala_keluarga'   =>  'Agung Jatmiko Saksono',
            'no_kk'             =>  '3374101212056439'
        ]);
        $user8->assignRole('user');

        $user9 = User::create([
            'kepala_keluarga'   =>  'Rafael Sudarmadi, DRS',
            'no_kk'             =>  '3374101312057205'
        ]);
        $user9->assignRole('user');

        $user10 = User::create([
            'kepala_keluarga'   =>  'Kusmiati',
            'no_kk'             =>  '3374100808120011'
        ]);
        $user10->assignRole('user');

        $user11 = User::create([
            'kepala_keluarga'   =>  'Albertus Herry Winarno',
            'no_kk'             =>  '3374101412051470'
        ]);
        $user11->assignRole('user');

        $user12 = User::create([
            'kepala_keluarga'   =>  'Wishnu Wijayanto, Ir',
            'no_kk'             =>  '3374101212059706'
        ]);
        $user12->assignRole('user');

        $user13 = User::create([
            'kepala_keluarga'   =>  'Tji Ong Tjik',
            'no_kk'             =>  '3374101212058056'
        ]);
        $user13->assignRole('user');

        $user14 = User::create([
            'kepala_keluarga'   =>  'Sakuwan',
            'no_kk'             =>  '3321011904060040'
        ]);
        $user14->assignRole('user');

        $user15 = User::create([
            'kepala_keluarga'   =>  'Siti Maemunah',
            'no_kk'             =>  '3374100605140002'
        ]);
        $user15->assignRole('user');

        $user16 = User::create([
            'kepala_keluarga'   =>  'Daniel Edi Prabowo',
            'no_kk'             =>  '3374101512053933'
        ]);
        $user16->assignRole('user');

        $user17 = User::create([
            'kepala_keluarga'   =>  'Handriyo Utomo',
            'no_kk'             =>  '3374101412052074'
        ]);
        $user17->assignRole('user');

        $user18 = User::create([
            'kepala_keluarga'   =>  'Luhur Damar Sesongko',
            'no_kk'             =>  '3374100609120014'
        ]);
        $user18->assignRole('user');

        $user19 = User::create([
            'kepala_keluarga'   =>  'Meiyasto',
            'no_kk'             =>  '3374101712100005'
        ]);
        $user19->assignRole('user');

        $user20 = User::create([
            'kepala_keluarga'   =>  'Sugeng Priyatno',
            'no_kk'             =>  '3374101212055441'
        ]);
        $user20->assignRole('user');

        $user21 = User::create([
            'kepala_keluarga'   =>  'Aziz Argum Bumi Sumbodo',
            'no_kk'             =>  '3374100703180008'
        ]);
        $user21->assignRole('user');

        $user22 = User::create([
            'kepala_keluarga'   =>  'Fadjar Setiawan',
            'no_kk'             =>  '3374102203220006'
        ]);
        $user22->assignRole('user');

        $user23 = User::create([
            'kepala_keluarga'   =>  'Rustamaji',
            'no_kk'             =>  '3374101512054783'
        ]);
        $user23->assignRole('user');

        $user24 = User::create([
            'kepala_keluarga'   =>  'Yuni Haryani',
            'no_kk'             =>  '3374101512051724'
        ]);
        $user24->assignRole('user');

        $user25 = User::create([
            'kepala_keluarga'   =>  'Hanna Sutedjo',
            'no_kk'             =>  '3374102003230002'
        ]);
        $user25->assignRole('user');

        $user26 = User::create([
            'kepala_keluarga'   =>  'Ampala Khoryanton',
            'no_kk'             =>  '3374101212056917'
        ]);
        $user26->assignRole('user');

        $user27 = User::create([
            'kepala_keluarga'   =>  'Nanok Riyawan, ST',
            'no_kk'             =>  '3374102311090005'
        ]);
        $user27->assignRole('user');

        $user28 = User::create([
            'kepala_keluarga'   =>  'Didi Rudita',
            'no_kk'             =>  '3320051501080002'
        ]);
        $user28->assignRole('user');

        $user29 = User::create([
            'kepala_keluarga'   =>  'Revie Rachmansyah Pratama',
            'no_kk'             =>  '3374100212210015'
        ]);
        $user29->assignRole('user');

        $user30 = User::create([
            'kepala_keluarga'   =>  'Fajsa Ardiansyah',
            'no_kk'             =>  '0'
        ]);
        $user30->assignRole('user');

        $user31 = User::create([
            'kepala_keluarga'   =>  'Edy Marsono',
            'no_kk'             =>  '3320061904210001'
        ]);
        $user31->assignRole('user');

        $user32 = User::create([
            'kepala_keluarga'   =>  'Sugiyono A Rohman',
            'no_kk'             =>  '3374131212058770'
        ]);
        $user32->assignRole('user');
    }
}
