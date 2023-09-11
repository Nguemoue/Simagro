<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('rdv', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->constrained()->cascadeOnDelete();
            $table->foreignId("administrateur_id")->constrained()->cascadeOnDelete();
            $table->date("date_rdv");
            $table->string("lieu");
            $table->string("but");
            $table->boolean("confirmation")->default(false);
            $table->integer("nombre_heure")->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rdv');
    }
};
