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
        Schema::create('cereri', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('type');
            $table->json('form_data'); // full_name;number;ROM/DM;user;dataserver/qnap/synology;cod_iso;date;
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_cereri');
            $table->unsignedBigInteger('number')->unique();
            $table->string('responsable');
            $table->string('RSMI');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cereri');
    }
};
