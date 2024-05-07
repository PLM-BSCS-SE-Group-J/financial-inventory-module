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
            $table->string('AssetCode');
            $table->string('AssetDesc');
            $table->string('AccountTitle');
            $table->string('AccountClass');
            $table->integer('UseLife');
            $table->date('dateAcquired');
            $table->double('OrigCost',12,2);
            $table->double('NetbookVal',12,2);
            $table->string('status');
            $table->double('AccuDep',12,2);
            $table->double('MonthlyDep',12,2);
            $table->double('YearlyDep',12,2);
            $table->date('dateRetired')->nullable();
            $table->string('PersonCharge')->nullable();
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
