<?php

namespace Database\Seeders;

use App\Models\PollingStations;
use App\Models\PollingDistricts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollingStationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Load CSV data
         $csvData = array_map('str_getcsv', file('c:/Users/komot/OneDrive/Documents/Github/Learning-Laravel/polling_stations.csv'));
        
         // Skip the first row (headings)
          array_shift($csvData);
         // Define the polling districts array
 
         try {
             // foreach ($csvData as $row) {
             //     Constituencies::create([
             //         'code' => $row[0], // Assuming the first column contains the code
             //         'name' => $row[1], // Assuming the second column contains the name
             //     ]);
             // }
 
             foreach ($csvData as $row) {
                // Find the constituency id based on the name in the CSV
                $pollingDistrictId  = PollingDistricts::where('name', $row[2])->value('id');
    
                // Check if a matching constituency was found
                if ($pollingDistrictId ) {
                    PollingStations::create([
                        'code' => $row[0], // Assuming the first column contains the name
                        'name' => $row[1], // Assuming the second column contains the location
                        'polling_districts_id' => $pollingDistrictId ,
                        // Add more fields as needed
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
