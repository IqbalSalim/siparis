<?php

namespace Database\Seeders;

use App\Models\Arsip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArsipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Arsip::factory()->count(30)->create();
    }
}
