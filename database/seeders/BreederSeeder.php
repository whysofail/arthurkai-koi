<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BreederSeeder extends Seeder
{
    public function run()
    {
        // Path to your CSV file in public/csv
        $filePath = public_path('csv/breeder.csv');
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
                    'name' => $record['Breeder Name'],
                    'code' => $record['Breeder code'],
                    'website' => $record['Breeder Website'] ?: null,
                    'location' => $record['Location Breeder'] ?: null,
                    'contact' => $record['Contact'] ?: null,
                    'created_at' => $currentTimestamp,
                    'updated_at' => $currentTimestamp,
                ];
            }
        }

        // Insert into the database
        DB::table('breeder')->insert($records);
    }
}
