<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MetodosDePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metodos = [
        	['metodo_pago' => 'Bolivares', 'creado_por' => 1, 'created_at' => Carbon::now()],
            ['metodo_pago' => 'Divisa', 'creado_por' => 1, 'created_at' => Carbon::now()],
            ['metodo_pago' => 'Pago Movil', 'creado_por' => 1, 'created_at' => Carbon::now()],
            ['metodo_pago' => 'Transferencia', 'creado_por' => 1, 'created_at' => Carbon::now()],
        ];

        foreach ($metodos as $value) {
            DB::table('metodos')->insert($value);
        }
    }
}
