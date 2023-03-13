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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_service');
            $table->unsignedBigInteger('id_fournisseur');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->tinyInteger('number_month')->unsigned();
            $table->foreign('id_service')
                ->references('id')->on('services')
                ->onDelete('cascade');
            $table->foreign('id_fournisseur')
                    ->references('id')->on('fournisseurs')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('abonnements');
    }
};
