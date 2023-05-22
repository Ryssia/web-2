<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEixosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('eixos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->min(10);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('eixos');
    }
}
