<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom puskesmas_id setelah kolom role
            $table->unsignedBigInteger('puskesmas_id')->nullable()->after('role');

            // Tambahkan foreign key constraint (pastikan tabel puskesmas sudah ada)
            $table->foreign('puskesmas_id')
                  ->references('id')
                  ->on('puskesmas')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus foreign key constraint terlebih dahulu
            $table->dropForeign(['puskesmas_id']);

            // Hapus kolom puskesmas_id
            $table->dropColumn('puskesmas_id');
        });
    }
};
