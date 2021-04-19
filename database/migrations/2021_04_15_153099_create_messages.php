<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message');
            //$table->date('date');
            $table->unsignedBigInteger('idplayer');
            $table->foreign('idplayer', 'fk_messages_players')
            ->on('players')
            ->references('id')
            ->onDelete('restrict');
            $table->unsignedBigInteger('idparty');
            $table->foreign('idparty', 'fk_messages_parties')
            ->on('parties')
            ->references('id')
            ->onDelete('restrict');
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
        Schema::dropIfExists('messages');
    }
}
