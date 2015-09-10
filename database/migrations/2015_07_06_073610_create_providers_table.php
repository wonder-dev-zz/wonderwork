<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref');
            $table->string('denomination');
            $table->string('tva')->nullable();
            $table->integer('group_id')->unsigned()->index()->default(0);
            $table->float('credit')->default(0);
            $table->float('encours')->default(0);
            $table->integer('mode_id')->unsigned()->index()->default(0);
            $table->integer('risque')->unsigned()->default(0);
            $table->integer('mode-tva')->unsigned()->default(0);
            $table->string('remise')->nullable();
            $table->string('banque')->nullable();
            $table->string('badresse')->nullable();
            $table->string('bcp')->nullable();
            $table->string('bville')->nullable();
            $table->string('bpays')->nullable();
            $table->string('compte')->nullable();
            $table->string('iban')->nullable();
            $table->string('bic')->nullable();
            $table->longText('remarque')->nullable();
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
        Schema::drop('providers');
    }
}
