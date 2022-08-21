<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoyenneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyenne', function (Blueprint $table) {
            $table->id();
            $table->string('moyenne');
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
                ->references('id')
                ->on('eleves')
                ->onDelete('cascade');
            $table->unsignedBigInteger('matiere_id');
            $table->foreign('matiere_id')
                ->references('id')
                ->on('matieres')
                ->onDelete('cascade');
            $table->unsignedBigInteger('note_id');
            $table->foreign('note_id')
                ->references('id')
                ->on('notes')
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
        Schema::dropIfExists('moyenne');
    }
}
