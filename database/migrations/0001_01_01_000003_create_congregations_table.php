<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('congregations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->text('address');
            $table->enum('position', ['Pendeta', 'Sekretaris', 'Bendahara', 'Penatua', 'Diaken', 'Anggota'])->default('Anggota');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Pindah', 'Meninggal Dunia'])->default('Aktif');
            $table->timestamps();

            $table->index('name');
            $table->index('gender');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('congregations');
    }
};
