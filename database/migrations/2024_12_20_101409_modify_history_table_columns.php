<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyHistoryTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history', function (Blueprint $table) {
            // Modify 'year' column from integer to date
            $table->date('date')->nullable()->change();

            // Modify 'photo' column from string to text
            $table->text('photo')->nullable()->change();

            // Modify 'video' column from string to text
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
        Schema::table('history', function (Blueprint $table) {
            // Rollback 'year' column from date to integer
            $table->integer('year')->nullable()->change();

            // Rollback 'photo' column from text to string
            $table->string('photo')->nullable()->change();

            // Rollback 'video' column from text to string
            $table->string('video')->nullable()->change();
        });
    }
}
