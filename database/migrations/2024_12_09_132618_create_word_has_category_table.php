<?php

// database/migrations/xxxx_xx_xx_create_word_has_category_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordHasCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('word_has_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('word_id');
            
            // Foreign keys
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('word_id')->references('id')->on('word')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('word_has_category');
    }
}
