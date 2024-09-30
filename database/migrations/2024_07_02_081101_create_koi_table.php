<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koi', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('nickname')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Unknown'])->nullable();
            $table->unsignedBigInteger('breeder_id')->nullable();
            $table->unsignedBigInteger('bloodline_id')->nullable();
            $table->unsignedBigInteger('variety_id')->nullable();
            $table->integer('sequence')->nullable();
            $table->string('size')->nullable();
            $table->unsignedInteger('price_buy_idr')->nullable();
            $table->unsignedInteger('price_buy_jpy')->nullable();
            $table->unsignedInteger('price_sell_idr')->nullable();
            $table->unsignedInteger('price_sell_jpy')->nullable();
            // $table->unsignedBigInteger('seller_id')->nullable();
            // $table->unsignedBigInteger('handler_id')->nullable();
            $table->string('seller')->nullable();
            $table->string('handler')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('location')->nullable();
            $table->text('photo')->nullable();
            $table->string('video')->nullable();
            $table->string('trophy')->nullable();
            $table->string('certificate')->nullable();
            $table->date('sell_date')->nullable();
            $table->string('buyer_name')->nullable();
            $table->date('death_date')->nullable();
            $table->text('death_note')->nullable();
            $table->enum('status', ['Available', 'Sold', 'Death'])->default('Available');
            $table->timestamps();
            $table->foreign('breeder_id')->references('id')->on('breeder')->onDelete('set null');
            $table->foreign('variety_id')->references('id')->on('variety')->onDelete('set null');
            $table->foreign('bloodline_id')->references('id')->on('bloodline')->onDelete('set null');
            // $table->foreign('seller_id')->references('id')->on('agent')->onDelete('set null');
            // $table->foreign('handler_id')->references('id')->on('agent')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koi');
    }
}
