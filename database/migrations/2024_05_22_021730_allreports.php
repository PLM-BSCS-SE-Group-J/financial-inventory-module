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
        Schema::create('allreports', function (Blueprint $table) {
        $table->id()->unique()->autoIncrement();
        $table->string('EmpFirstName');
        $table->string('EmpLastName');
        $table->date('dateRequested');
        $table->date('dateIssued');
        $table->string('Remarks');
        $table->string('selectedAssets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
