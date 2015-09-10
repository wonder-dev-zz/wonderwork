<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('societe');
            $table->string('adresse');
            $table->string('cp');
            $table->string('ville');
            $table->string('pays')->nullable();
            $table->integer('forme')->unsigned()->default(0);
            $table->string('tel')->nullable();
            $table->string('gsm')->nullable();
            $table->string('fax')->nullable();
            $table->string('mail')->nullable();
            $table->string('site')->nullable();
            $table->integer('provider_id')->unsigned()->index();
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
        Schema::drop('addresses');
    }
}
