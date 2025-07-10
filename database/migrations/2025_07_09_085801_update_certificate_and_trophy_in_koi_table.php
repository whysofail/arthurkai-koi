<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCertificateAndTrophyInKoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('koi', function (Blueprint $table) {
            Schema::table('koi', function (Blueprint $table) {
                // Example: Change to text, or allow null, or whatever your goal is
                $table->text('certificate')->nullable()->change();
                $table->text('trophy')->nullable()->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('koi', function (Blueprint $table) {
            Schema::table('koi', function (Blueprint $table) {
                // Example: Change to text, or allow null, or whatever your goal is
                $table->string('certificate')->nullable()->change();
                $table->string('trophy')->nullable()->change();
            });
        });
    }
}
