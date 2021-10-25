<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::create([
            'name' => 'Kidimbwi',
            'entrance_fee' => (float)10000.00
        ]);
        Club::create([
            'name' => 'Tips',
            'entrance_fee' => (float)0.00
        ]);
        Club::create([
            'name' => 'Polos',
            'entrance_fee' => (float)0.00
        ]);
        Club::create([
            'name' => 'Samaki Samaki Masaki',
            'entrance_fee' => (float)0.00
        ]);
        Club::create([
            'name' => 'Samaki Samaki Mcity',
            'entrance_fee' => (float)0.00
        ]);
        Club::create([
            'name' => 'Bull\'s Park',
            'entrance_fee' => (float)0.00
        ]);
        Club::create([
            'name' => '777',
            'entrance_fee' => (float)0.00
        ]);
        Club::create([
            'name' => 'Havoc',
            'entrance_fee' => (float)10000.00
        ]);
        Club::create([
            'name' => 'Olive',
            'entrance_fee' => (float)0.00
        ]);
        Club::create([
            'name' => 'Pitstop',
            'entrance_fee' => (float)0.00
        ]);
    }
}
