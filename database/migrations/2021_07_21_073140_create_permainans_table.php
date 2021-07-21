<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermainansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permainans', function (Blueprint $table) {
            $table->id();

            $table->string('nama', 25);
            $table->integer('harga');
            $table->string('syarikat', 50);
            $table->string('jenis', 50);
            $table->string('pub_date', 20);

            $table->foreignId('kedai_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permainans');
    }
}
