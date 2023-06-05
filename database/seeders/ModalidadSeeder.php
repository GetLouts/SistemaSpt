<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modalidad = [
        	['modalidad' => 'Presencial', 'created_at' => Carbon::now()],
            ['modalidad' => 'A Distancia', 'created_at' => Carbon::now()],
            ['modalidad' => 'Mixto', 'created_at' => Carbon::now()],
        ];
        foreach ($modalidad as $value) {
            DB::table('modalidads')->insert($value);
        }
    }
}
