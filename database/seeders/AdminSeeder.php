<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('admins')
        ->insert([
            'name'  => "Antor Islam",
            'username'  => "antorislam",
            'email' => "admin@email.com",
            'type'  => "master_admin",
            "password" => bcrypt('abcdabcd'),
        ]);
    }
}
