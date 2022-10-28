<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()   
    {
        DB::table('employees')->insert([
            'nama'=> 'Yenni',
            'jeniskelamin' => 'perempuan',
             'notelp'=> '089393931111',
        ]);
    }
}
