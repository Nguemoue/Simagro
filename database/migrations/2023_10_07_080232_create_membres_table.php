<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom")->nullable();
            $table->string("telephone")->nullable();
            $table->string("addresse")->nullable();
            $table->string("photo_url");
            $table->string("fonction");
            $table->set("sexe",['Homme','Femme']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membres');
    }
};
