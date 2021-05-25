<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id('cardId')->unique();
            $table->float('normal')->nullable();
            $table->float('holofoil')->nullable();
            $table->float('reverseHolofoil')->nullable();
            $table->float('firstEditionHolofoil')->nullable();
            $table->string('buyURL')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
