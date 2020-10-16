<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStyleCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('style_cards', function (Blueprint $table) {
            $table->id();
            $table->string('background');
            $table->string('text');
            $table->timestamps();
        });

        Schema::table('cards', function (Blueprint $table) {
           $table->foreignId('style_card_id')->default('1')->constrained()->onDelete('set default');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('style_cards');
    }
}
