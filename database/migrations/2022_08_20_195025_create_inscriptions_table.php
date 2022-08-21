<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('email');
            $table->date('date_de_naissance');
            $table->string('lieu_de_naissance');
            $table->string('adresse');
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
            $table->unsignedBigInteger('annee_id');
            $table->foreign('annee_id')
                ->references('id')
                ->on('annee_scolaire')
                ->onDelete('cascade');
            $table->string('acte_de_naissance');
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
        Schema::dropIfExists('inscriptions');
    }
}
