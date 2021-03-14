<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeployCablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deploy_cables', function (Blueprint $table) {
            $table->id();
            $table->string('name_pop');
            $table->string('plan_code');
            $table->string('request_day')->nullable();
            $table->string('return_day')->nullable();
            $table->string('send_file_opn')->nullable();
            $table->string('take_invoice')->nullable();
            $table->string('pay_money')->nullable();
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
        Schema::dropIfExists('deploy_cables');
    }
}
