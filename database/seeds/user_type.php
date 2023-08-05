<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_type extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert([
            'id' => '1',
            'user_type_description' => 'Admin',
        ]);

        DB::table('user_type')->insert([
            'id' => '2',
            'user_type_description' => 'Moderador',
        ]);

        DB::table('user_type')->insert([
            'id' => '3',
            'user_type_description' => 'Utilizador',
        ]);

        DB::table('user_type')->insert([
            'id' => '4',
            'user_type_description' => 'Utilizador Suspenso',
        ]);

        DB::table('user_type')->insert([
            'id' => '5',
            'user_type_description' => 'Utilizador Eliminado',
        ]);
    }
}
