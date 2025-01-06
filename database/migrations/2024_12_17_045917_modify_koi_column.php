<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ModifyKoiColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modify the 'status' column to add 'Auction' to the ENUM options
        DB::statement("ALTER TABLE koi MODIFY COLUMN status ENUM('Available', 'Sold', 'Death', 'Auction') DEFAULT 'Available'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Ensure no invalid values are in the 'status' column
        DB::statement("UPDATE koi SET status = 'Available' WHERE status NOT IN ('Available', 'Sold', 'Death')");

        // Rollback the 'status' column to the previous ENUM options
        DB::statement("ALTER TABLE koi MODIFY COLUMN status ENUM('Available', 'Sold', 'Death') DEFAULT 'Available'");
    }

}
