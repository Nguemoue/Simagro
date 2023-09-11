<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom")->nullable();
            $table->string("bp")->nullable();
            $table->string("ville");
            $table->string("pays");
            $table->string("type_compte");
            $table->string("telephone")->nullable();
            $table->string("password");
            $table->string("photo")->nullable();
            $table->string("email")->unique();
            $table->dateTime("email_verified_at")->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
