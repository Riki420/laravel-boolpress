<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsrInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usr_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->onDelete('set null')->constrained();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('image', 250)->nullable();
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
        Schema::dropIfExists('usr_infos');
    }
}
