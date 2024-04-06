<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Constituencies;
use App\Models\PollingDistricts;

class PollingDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Load CSV data
        $csvData = array_map('str_getcsv', file('c:/Users/komot/OneDrive/Documents/Github/Learning-Laravel/polling_districts.csv'));
        
        // Skip the first row (headings)
         array_shift($csvData);
        // Define the polling districts array
        $pollingDistricts = [];

        try {
            // foreach ($csvData as $row) {
            //     Constituencies::create([
            //         'code' => $row[0], // Assuming the first column contains the code
            //         'name' => $row[1], // Assuming the second column contains the name
            //     ]);
            // }

            foreach ($csvData as $row) {
                // Find the constituency id based on the name in the CSV
                $constituencyId = Constituencies::where('name', $row[2])->value('id');
                print $constituencyId;
                // Check if a matching constituency was found
                if ($constituencyId) {
                    PollingDistricts::create([
                        'code' => $row[0], // Assuming the first column contains the name
                        'name' => $row[1], // Assuming the second column contains the location
                        'constituencies_id' => $constituencyId,
                        
                    ]);
                } else {
                    // Log or handle the case where no matching constituency was found
                    // For example: Log::error("No matching constituency found for: {$row[2]}");
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
