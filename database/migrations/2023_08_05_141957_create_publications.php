<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();

            $table->foreignId("administrateur_id")->constrained()->cascadeOnDelete();
            $table->foreignId("domaine_publication_id")->constrained()->cascadeOnDelete();
            $table->string("contenu");
            $table->string("titre");
            $table->dateTime("date_publication");
            $table->tinyInteger("statut")->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publications');
    }
};
