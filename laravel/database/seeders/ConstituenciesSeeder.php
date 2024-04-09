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
        // Load CSV data
        $csvData = array_map('str_getcsv', file('c:/Users/komot/OneDrive/Documents/Github/Learning-Laravel/constituencies.csv'));

        // Skip the first row (headers) if needed
        array_shift($csvData);

        // Iterate through CSV data and insert into database
        try {
            foreach ($csvData as $row) {
                Constituencies::create([
                    'code' => $row[0], // Assuming the first column contains the code
                    'name' => $row[1], // Assuming the second column contains the name
                ]);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
