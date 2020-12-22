<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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

        DB::table('style_cards')->insert([
            'background' => '#3C3B3D',
            'text' => '#ffffff',
        ]);
        DB::table('style_cards')->insert([
            'background' => '#fc0fc0',
            'text' => '#808080',
        ]);
        DB::table('style_cards')->insert([
            'background' => '#FFF200',
            'text' => '#600CAC',
        ]);
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
