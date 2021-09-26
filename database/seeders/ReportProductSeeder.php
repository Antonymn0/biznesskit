<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReportProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\ReportProduct::factory(10)->create();
    }
}
