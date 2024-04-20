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
        Schema::create('fixed_assets', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('AccountNum')->unique();
            $table->string('ItemName');
            $table->string('AccountName')->unique();
            $table->string('Status');
            $table->date('dateAcquired');
            $table->double('OrigVal',12,2);
            $table->double('CurrentVal',12,2);
            $table->double('DepVal',12,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixed_assets');
    }
};
