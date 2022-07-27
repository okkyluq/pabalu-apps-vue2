<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('kategori', 100);
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });

        // for ($i=0; $i < 1000; $i++) {
        //     DB::table('kategori')->insert([
        //         [ 'kategori' => 'Kategori-'.$i, 'keterangan' => 'Kategori-'.$i, 'created_by' => 1],
        //     ]);
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
