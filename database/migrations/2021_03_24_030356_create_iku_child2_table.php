<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkuChild2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iku_child2', function (Blueprint $table) {
            $table->integer('id_iku_child2', true);
            $table->integer('id_iku_parent')->unique('id_iku_parent');
            $table->integer('iku_child2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iku_child2');
    }
}
