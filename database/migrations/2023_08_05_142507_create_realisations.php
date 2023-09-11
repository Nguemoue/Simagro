<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('realisations', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->text("contenu");
            $table->string("lieu");
            $table->date("date_realisation");
            $table->string("realisateur");
            $table->integer("nombre_jour");
            $table->string("photo")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('realisations');
    }
};
