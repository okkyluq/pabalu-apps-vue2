<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otoritas_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_id');
            $table->enum('view', ['true', 'false'])->default('true');
            $table->enum('create', ['true', 'false'])->default('true');
            $table->enum('edit', ['true', 'false'])->default('true');
            $table->enum('delete', ['true', 'false'])->default('true');
            $table->enum('export', ['true', 'false'])->default('true');
            $table->enum('import', ['true', 'false'])->default('true');
            $table->timestamps();

            $table->foreign('menu_id')->on('menu')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otoritas_menu');
    }
};
