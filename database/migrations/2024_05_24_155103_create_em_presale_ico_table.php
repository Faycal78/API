<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmPresaleIcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('em_presale_ico', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id', 255)->nullable()->unique();
            $table->string('wallet_id', 255)->nullable()->index();
            $table->string('email', 120)->nullable();
            $table->decimal('usdvalue', 10, 2)->unsigned()->nullable();
            $table->decimal('tokensquantity', 10, 2)->unsigned()->nullable();
            $table->decimal('amoutbought', 10, 2)->unsigned()->nullable();
            $table->enum('typecrypto', ['BNB', 'ETH', 'USDT', 'CARD', 'MATIC'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('em_presale_ico');
    }
}

