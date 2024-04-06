<?php

namespace Database\Factories;

use App\Models\Constituencies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollingDistricts>
 */
class PollingDistrictsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
         // Load CSV data
         $csvData = array_map('str_getcsv', file('c:/Users/komot/OneDrive/Documents/Github/Learning-Laravel/polling_districts.csv'));
        
        // Skip the first row (headings)
         array_shift($csvData);
        // Define the polling districts array
        $pollingDistricts = [];
        

        // Iterate through CSV data
        foreach ($csvData as $row) {
            // Find the constituency id based on the name in the CSV
            $constituencyId = Constituencies::where('name', $row[2])->value('id');

            // Check if a matching constituency was found
            if ($constituencyId) {
                $pollingDistricts[] = [
                    'code' => $row[0], // Assuming the first column contains the name
                    'name' => $row[1], // Assuming the second column contains the location
                    'constituencies_id' => $constituencyId,
                    // Add more fields as needed
                ];
            } else {
                // Log or handle the case where no matching constituency was found
                // For example: Log::error("No matching constituency found for: {$row[2]}");
            }
        }

        return $pollingDistricts;
    }
}
