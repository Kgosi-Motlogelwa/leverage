<?php

namespace Database\Factories;

use App\Models\Constituencies;
use Illuminate\Database\Eloquent\Factories\Factory;


class ConstituenciesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Constituencies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Load CSV data
        $csvData = array_map('str_getcsv', file('c:/Users/komot/OneDrive/Documents/Github/Learning-Laravel/constituencies.csv'));

        // Skip the first row (headings)
        array_shift($csvData);

        // Define the constituencies array
        $constituencies = [];

        // Iterate through CSV data
        foreach ($csvData as $row) {
            $constituencies[] = [
                'code' => $row[0], // Assuming the first column contains the code
                'name' => $row[1], // Assuming the second column contains the name
                // No need to specify 'id' column as it's auto-incremented
            ];
        }

        return $constituencies;
    }
}
