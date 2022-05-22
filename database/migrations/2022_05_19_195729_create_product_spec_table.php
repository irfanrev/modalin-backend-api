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
        Schema::create('product_spec', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('product_id');

            $table->string('cc')->nullable();
            $table->string('silinder')->nullable();
            $table->string('tipe_mesin')->nullable();
            $table->string('torsi_max')->nullable();
            $table->string('transmisi')->nullable();
            $table->string('tipe')->nullable();
            $table->string('pendingin')->nullable();
            $table->string('suplay')->nullable();
            $table->string('diameter')->nullable();
            $table->string('daya_max')->nullable();
            $table->string('susunan_silinder')->nullable();
            
            $table->softDeletes();
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
        Schema::dropIfExists('product_spec');
    }
};
