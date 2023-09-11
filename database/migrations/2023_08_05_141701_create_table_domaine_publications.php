<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('domaine_publications', function (Blueprint $table) {
            $table->id();
            $table->string("libelle")->unique();
            $table->text("description");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('domaine_publications');
    }
};
