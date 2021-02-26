<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 50);
            $table->double('price');            
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *z
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
