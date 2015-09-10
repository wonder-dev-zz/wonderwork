<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref');
            $table->string('denomination');
            $table->string('tva')->nullable();
            $table->integer('family_id')->unsigned()->index()->default(0);
            $table->float('credit')->default(0);
            $table->float('encours')->default(0);
            $table->integer('mode_id')->unsigned()->index()->default(0);
            $table->integer('risque')->unsigned()->default(0);
            $table->string('societe')->nullable();
            $table->string('adresse')->nullable();
            $table->string('cp')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->integer('forme')->unsigned()->default(0);
            $table->string('tel')->nullable();
            $table->string('gsm')->nullable();
            $table->string('fax')->nullable();
            $table->string('mail')->nullable();
            $table->string('site')->nullable();
            $table->integer('mode-tva')->default(0);
            $table->integer('remise_id')->unsigned()->index()->default(0);
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
        Schema::drop('clients');
    }
}
