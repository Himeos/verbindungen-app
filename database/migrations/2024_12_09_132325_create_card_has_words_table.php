<?php

// database/migrations/xxxx_xx_xx_create_card_has_words_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardHasWordsTable extends Migration
{
    public function up()
    {
        Schema::create('card_has_words', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('word_id');
            
            // Foreign keys
            $table->foreign('card_id')->references('id')->on('card')->onDelete('cascade');
            $table->foreign('word_id')->references('id')->on('word')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('card_has_words');
    }
}

