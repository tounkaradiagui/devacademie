<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->id();
            $table->string('resultat');
            $table->unsignedBigInteger('niveau_id');
            $table->foreign('niveau_id')
                ->references('id')
                ->on('niveaux')
                ->onDelete('cascade');
            $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
                ->references('id')
                ->on('eleves')
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
        Schema::dropIfExists('resultats');
    }
}
