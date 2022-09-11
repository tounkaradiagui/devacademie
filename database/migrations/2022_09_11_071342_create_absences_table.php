<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
                ->references('id')
                ->on('inscriptions')
                ->onDelete('cascade');
            $table->unsignedBigInteger('cours_id');
            $table->foreign('cours_id')
            ->references('id')
            ->on('cours')
            ->onDelete('cascade');
            $table->string('motifs');
            $table->string('avertissements');
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
        Schema::dropIfExists('absences');
    }
}
