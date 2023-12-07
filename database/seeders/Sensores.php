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
        $array = [['Name' => 'Temperatura','sensor_id' => '2673069', 'Unidad' => '°C'],
                  ['Name' => 'Humedad','sensor_id' => '2683208','Unidad' => '%'],
                  ['Name' => 'Luz', 'sensor_id' => '2683231','Unidad' => 'raw'],
                  ['Name' => 'Acelerometro', 'sensor_id' => '2689220','Unidad' => 'rpm'],
                  ['Name' => 'Ultrasonico', 'sensor_id' => '2683279','Unidad' => 'cm'],
                  ['Name' => 'Movimiento', 'sensor_id' => '2683295','Unidad' => 'boolean'],
                  ['Name' => 'Infrarojo', 'sensor_id' => '2688472','Unidad' => 'boolean']
                  ];
        foreach ($array as $key => $value) {
            DB::table('Sensores')->insert($value);
        }
    }
}
