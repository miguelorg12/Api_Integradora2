<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [['Nombre' => 'Hamster'],
        ['Nombre' => 'Raton'],
        ['Nombre' => 'Cuyo'],
        ['Nombre' => 'Uron']];
            foreach ($array as $key => $value) {
            DB::table('Animales')->insert($value);
            }
    }
}
