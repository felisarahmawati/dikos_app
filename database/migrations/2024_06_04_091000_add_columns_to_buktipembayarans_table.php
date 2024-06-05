<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('buktipembayarans', function (Blueprint $table) {
            $table->date('tanggal_masuk_uang')->nullable()->after('status_konfirmasi');
            $table->decimal('jumlah_uang', 10, 2)->nullable()->after('tanggal_masuk_uang');
            $table->string('keterangan')->nullable()->after('jumlah_uang');
            // Tambah kolom 'user_id'
            $table->unsignedBigInteger('user_id')->nullable()->after('keterangan');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('buktipembayarans', function (Blueprint $table) {
            // Hapus foreign key dan kolom 'user_id'
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            // Hapus kolom 'keterangan'
            $table->dropColumn('keterangan');
            $table->dropColumn('jumlah_uang');
            $table->dropColumn('tanggal_masuk_uang');
        });
    }
};
