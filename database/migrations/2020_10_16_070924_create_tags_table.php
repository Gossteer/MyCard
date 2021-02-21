<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->timestamps();
        });

        DB::table('tags')->insert([
            'tag' => 'Общее',
        ]);

        DB::table('tags')->insert([
            'tag' => 'Книги',
        ]);

        DB::table('tags')->insert([
            'tag' => 'Статьи',
        ]);

        DB::table('tags')->insert([
            'tag' => 'Фильмы',
        ]);

        DB::table('tags')->insert([
            'tag' => 'Сериалы',
        ]);

        DB::table('tags')->insert([
            'tag' => 'Мультфильмы',
        ]);

        DB::table('tags')->insert([
            'tag' => 'Видео',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
