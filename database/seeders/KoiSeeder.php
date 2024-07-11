<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KoiSeeder extends Seeder
{
    public function run()
    {
        // Path to your CSV file in public/csv
        $filePath = public_path('csv/kois.csv');
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
                    'code' => $this->nullIfEmpty($record['KOI Code']),
                    'variety_id' => $this->nullIfEmpty($record['VariationID']),
                    'breeder_id' => $this->nullIfEmpty($record['BreederID']),
                    'bloodline_id' => $this->nullIfEmpty($record['BloodlineID']),
                    'sequence' => $this->nullIfEmpty($record['Sequence']),
                    'nickname' => $this->nullIfEmpty($record['Nickname']),
                    'gender' => $this->nullIfEmpty($record['Gender']),
                    'birthdate' => $this->nullIfEmpty($this->parseDate($record['Birth Year & Month'], 'M Y')),
                    'purchase_date' => $this->nullIfEmpty($this->parseDate($record['Purchase Date'])),
                    'seller' => $this->nullIfEmpty($record['Seller Agent']),
                    'handler' => $this->nullIfEmpty($record['Handling Agent']),
                    'price_buy_jpy' => $this->nullIfEmpty($this->convertToInt($record['Price Buy ( JPY )'])),
                    'price_buy_idr' => $this->nullIfEmpty($this->convertToInt($record['Price Buy ( IDR )'])),
                    'location' => $this->nullIfEmpty($record['Keeping Location']),
                    'photo' => $this->nullIfEmpty($record['Link Photos']),
                    'video' => $this->nullIfEmpty($record['Link Video']),
                    'trophy' => $this->nullIfEmpty($record['Link Trophy']),
                    'certificate' => $this->nullIfEmpty($record['Link Certificate']),
                    'price_sell_idr' => $this->nullIfEmpty($this->convertToInt($record['Sell Price (IDR)'])),
                    'price_sell_jpy' => $this->nullIfEmpty($this->convertToInt($record['Sell Price ( JPY)'])),
                    'sell_date' => $this->nullIfEmpty($this->parseDate($record['Date of Sell'])),
                    'buyer_name' => $this->nullIfEmpty($record['Buyer Name']),
                    'death_date' => $this->nullIfEmpty($this->parseDate($record['Date of Death'])),
                    'death_note' => $this->nullIfEmpty($record['Death Note']),
                    'created_at' => $currentTimestamp,
                    'updated_at' => $this->nullIfEmpty($this->parseDate($record['updated date'])) ?: $currentTimestamp,
                ];
            }
        }

        // Insert into the database
        DB::table('koi')->insert($records);
    }

    private function nullIfEmpty($value)
    {
        return $value === '' || $value === 'NULL' ? null : $value;
    }
    private function convertToInt($value)
    {
        return is_numeric($value) ? (int)$value : null;
    }
    private function parseDate($date, $format = 'M Y')
    {
        if($date === ' '){
            return null;
        }else{
            return $date ? Carbon::createFromFormat($format, $date)->startOfMonth() : null;
        }
    }
}
