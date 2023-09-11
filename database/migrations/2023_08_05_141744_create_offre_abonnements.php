<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('offre_abonnements', function (Blueprint $table) {
            $table->id();
            $table->string("libelle")->unique();
            $table->string("photo")->nullable();
            $table->float("prix", 20, 2);
            $table->text("description")->nullable();
            $table->tinyInteger("type_offre")->default(0);
            $table->json("destinataires")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offre_abonnements');
    }
};
