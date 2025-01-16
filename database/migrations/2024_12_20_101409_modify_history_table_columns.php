<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ModifyHistoryTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modify 'date' column from integer to date
        Schema::table('history', function (Blueprint $table) {
            // Add a temporary column to hold the new data type
            $table->date('temp_date')->nullable();
        });

        // Migrate data from the renamed 'date' column (integer) to 'temp_date'
        DB::statement('UPDATE history SET temp_date = STR_TO_DATE(CONCAT(date, "-01-01"), "%Y-%m-%d")');

        // Drop the old 'date' column
        Schema::table('history', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        // Rename 'temp_date' to 'date'
        Schema::table('history', function (Blueprint $table) {
            $table->renameColumn('temp_date', 'date');
        });

        // Modify 'photo' column from string to text
        Schema::table('history', function (Blueprint $table) {
            $table->text('photo')->nullable()->change();
        });

        // Modify 'video' column from string to text
        Schema::table('history', function (Blueprint $table) {
            $table->text('video')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Add the old 'date' column back as integer
        Schema::table('history', function (Blueprint $table) {
            $table->integer('temp_date')->nullable();
        });

        // Migrate data back to 'temp_date'
        DB::statement('UPDATE history SET temp_date = YEAR(date)');

        // Drop the current 'date' column
        Schema::table('history', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        // Rename 'temp_date' back to 'date'
        Schema::table('history', function (Blueprint $table) {
            $table->renameColumn('temp_date', 'date');
        });

        // Rollback 'photo' column from text to string
        Schema::table('history', function (Blueprint $table) {
            $table->string('photo')->nullable()->change();
        });

        // Rollback 'video' column from text to string
        Schema::table('history', function (Blueprint $table) {
            $table->string('video')->nullable()->change();
        });
    }
}
