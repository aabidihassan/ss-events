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
        Schema::create('feedback', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_fournisseur');
            $table->primary(['id_client', 'id_fournisseur']);
            $table->foreign('id_client')
                  ->references('id')->on('clients')
                  ->onDelete('cascade');
            $table->foreign('id_fournisseur')
                  ->references('id')->on('fournisseurs')
                  ->onDelete('cascade');
            $table->text('commentaire');
            $table->datetime('dateCommit')->useCurrent();
            $table->smallInteger('rating')->unsigned();;
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
        Schema::dropIfExists('feedback');
    }
};
