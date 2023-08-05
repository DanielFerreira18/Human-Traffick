<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class report_state extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_state')->insert([
            'id' => '1',
            'report_state_description' => 'Em processo',
        ]);

        DB::table('report_state')->insert([
            'id' => '2',
            'report_state_description' => 'Concluído com sucesso',
        ]);

        DB::table('report_state')->insert([
            'id' => '3',
            'report_state_description' => 'Concluído sem sucesso',
        ]);

        DB::table('report_state')->insert([
            'id' => '4',
            'report_state_description' => 'Cancelado',
        ]);
    }
}
