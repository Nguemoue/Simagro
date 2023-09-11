<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ressource_realisations', function (Blueprint $table) {
            $table->id();
            $table->string("url");
            $table->tinyInteger("type_resource")->default(0);
            $table->foreignId("realisation_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ressource_realisations');
    }
};
