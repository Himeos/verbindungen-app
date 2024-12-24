<?php

// database/migrations/xxxx_xx_xx_create_cards_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('card', function (Blueprint $table) {
            $table->id();
            $table->integer('difficulty');
            $table->boolean('used')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('card');
    }
}


