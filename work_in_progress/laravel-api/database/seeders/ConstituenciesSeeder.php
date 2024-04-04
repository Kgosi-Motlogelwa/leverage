<?php

namespace Database\Seeders;

use App\Models\Constituencies;
use Illuminate\Database\Seeder;
use Database\Factories\ConstituenciesFactory;

class ConstituenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Constituencies::factory()->count(62)->create();
    }
}
