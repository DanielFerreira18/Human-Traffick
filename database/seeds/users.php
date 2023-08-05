<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Admin',
            'surname' => 'Admin',
            'birthDate' => '2000-01-01',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'idUserType' => '1',
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => 'Mod',
            'surname' => 'Mod',
            'birthDate' => '2000-01-01',
            'email' => 'mod@gmail.com',
            'password' => Hash::make('mod'),
            'idUserType' => '2',
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'name' => 'User',
            'surname' => 'User',
            'birthDate' => '2000-01-01',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'idUserType' => '3',
        ]);

    }
}
