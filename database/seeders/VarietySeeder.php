<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = public_path('csv/variety.csv');
        $currentTimestamp = Carbon::now();

        // Read and parse the CSV file
        $file = file_get_contents($filePath);
        $lines = explode("\n", $file);
        $header = str_getcsv(array_shift($lines));

        $records = [];
        foreach ($lines as $line) {
            if (trim($line)) { // Skip empty lines
                $data = str_getcsv($line);
                $record = array_combine($header, $data);
                $records[] = [
                    'name' => $record['Variety Name'],
                    'code' => $record['Variety Code'],
                    'created_at' => $currentTimestamp,
                    'updated_at' => $currentTimestamp,
                ];
            }
        }

        // Insert into the database
        DB::table('variety')->insert($records);
    
    }
}
