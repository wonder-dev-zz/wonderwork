<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('adresse');
            $table->string('cp');
            $table->string('ville');
            $table->string('pays')->nullable();
            $table->string('tel')->nullable();
            $table->string('gsm')->nullable();
            $table->string('fax')->nullable();
            $table->integer('client_id')->unsigned()->index();
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
        Schema::drop('deliveries');
    }
}
