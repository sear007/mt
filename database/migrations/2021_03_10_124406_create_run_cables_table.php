<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunCablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run_cables', function (Blueprint $table) {
            $table->id();
            $table->integer('deploy_cable_id')->nullable();
            $table->string('cable_name')->nullable();
            $table->string('vat_tu')->nullable();
            $table->json('request')->nullable();
            $table->json('return')->nullable();
            $table->json('run')->nullable();
            $table->string('finish')->nullable();
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
        Schema::dropIfExists('run_cables');
    }
}
