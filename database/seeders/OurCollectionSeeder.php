<?php

namespace Database\Seeders;

use App\Models\Koi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Exception;

class OurCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = Carbon::now();
        $title = 'Lorem ipsum sit dolor amet';
        $description = '<h1>Title</h1><p><br></p><p>Lorem ipsum sit dolor amet</p><p><br></p>';

        // Corrected where condition
        $koi = Koi::whereNotNull('photo')->take(50)->get();

        $records = [];
        foreach ($koi as $k) {
            $records[] = [
                'title' => $title,
                'description' => $description,
                'koi_id' => $k->id,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ];
        }

        // Wrap the insert operation in a try-catch block
        try {
            DB::table('ourcollection')->insert($records);
        } catch (Exception $e) {
            // Handle the exception, for example, by logging the error and rethrowing the exception
            // You can use Laravel's logging facilities or any other error handling mechanism you prefer
            \Log::error('Failed to seed OurCollection table: ' . $e->getMessage());
            throw new Exception('Failed to seed OurCollection table');
        }
    }
}
