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
            $table->timestamp('request_day')->nullable();
            $table->timestamp('return_day')->nullable();
            $table->timestamp('send_file_opn')->nullable();
            $table->timestamp('take_invoice')->nullable();
            $table->timestamp('pay_money')->nullable();
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
