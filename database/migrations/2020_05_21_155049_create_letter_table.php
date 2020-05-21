<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('user_id');
            $table->string('title_name');
            $table->string('etc')->nullable();
            $table->string('detail');
            $table->string('date');
            $table->string('date_to');
            $table->string('all_time');
            $table->string('phone');
            $table->string('img')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('letter');
    }
}
