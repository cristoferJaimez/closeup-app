<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmas', function (Blueprint $table) {
            $table->id();
            $table->string('cod','50');
            $table->string('name_original');
            $table->string('adress');
            $table->string('utc');
            $table->string('lat');
            $table->string('lng');
            $table->string('img');
            $table->string('adress_real');
            $table->string('status');
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
        Schema::dropIfExists('pharmas');
    }
};
