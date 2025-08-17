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
        Schema::create('pengajuan_cuti', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('karyawan_id')->unsigned();
            $table->bigInteger('jenis_cuti_id')->unsigned();
            $table->string('approve_by', 50);
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->text('keterangan');
            $table->string('status', 25);
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
        Schema::dropIfExists('pengajuan_cuti');
    }
};
