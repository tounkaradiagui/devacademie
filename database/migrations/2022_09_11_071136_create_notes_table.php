<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
                ->references('id')
                ->on('inscriptions')
                ->onDelete('cascade');
            $table->unsignedBigInteger('matiere_id');
            $table->foreign('matiere_id')
                ->references('id')
                ->on('matieres')
                ->onDelete('cascade');
            $table->unsignedBigInteger('trimestre_id');
            $table->foreign('trimestre_id')
                ->references('id')
                ->on('trimestres')
                ->onDelete('cascade');
                $table->string('appreciations');
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
        Schema::dropIfExists('notes');
    }
}
