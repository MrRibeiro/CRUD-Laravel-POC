<?php

use Illuminate\Database\Seeder;

class ColaboradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colaborador')->insert([
            'fristname' => "Renan",
            'lastname' => "Silva",
            'role' => "Desenvolvedor",
            'empresa' => "Doidins Soluções"
        ]);
    }
}
