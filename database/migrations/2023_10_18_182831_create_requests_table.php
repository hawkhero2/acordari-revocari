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
        Schema::create('requests', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type_requests');
            $table->json('form_data'); // full_name; ROM/DM; user; dataserver/qnap/synology; cod_iso; date;
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('number')->unique();
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('requests_status');
            $table->boolean('state')->default(false);
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('responsable');
            $table->unsignedBigInteger('rmsi_id');
            $table->foreign('rmsi_id')->references('id')->on('rmsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
