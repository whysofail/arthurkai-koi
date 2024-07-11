<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodlineSeeder extends Seeder
{
    public function run()
    {
        // Path to your CSV file
        $filePath = public_path('csv/bloodline.csv');

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
                    'id' => $record['ID'],
                    'name' => $record['Blood Line Name'],
                    'code' => $record['Blood Line code'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert into the database
        DB::table('bloodline')->insert($records);
    }
}
