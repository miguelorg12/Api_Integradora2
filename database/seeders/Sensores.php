<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sensores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [['Name' => 'Temperatura', 'Unidad' => '°C'],
                  ['Name' => 'Humedad', 'Unidad' => '%'],
                  ['Name' => 'Luz', 'Unidad' => 'Ohms'],
                  ['Name' => 'Acelerometro', 'Unidad' => 'm/s'],
                  ['Name' => 'Ultrasonico', 'Unidad' => 'cm'],
                  ['Name' => 'Movimiento', 'Unidad' => 'm'],
                  ['Name' => 'Infrarojo', 'Unidad' => 'cm']
                  ];
        foreach ($array as $key => $value) {
            DB::table('Sensores')->insert($value);
        }
    }
}
