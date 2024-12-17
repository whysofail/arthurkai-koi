<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyKoiColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('koi', function (Blueprint $table) {
            $table->enum('status', ['Available', 'Sold', 'Death', 'Auction'])->default('Available')->change();
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
            $table->enum('status', ['Available', 'Sold', 'Death'])->default('Available')->change();
        });
    }
}
