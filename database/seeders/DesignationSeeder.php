<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Seed the designations table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            ['name' => 'Software Engineer'],
            ['name' => 'Project Manager'],
            ['name' => 'HR Manager'],
            ['name' => 'Data Analyst'],
            ['name' => 'UI/UX Designer'],
            ['name' => 'Sales Executive'],
        ]);
    }
}
