<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acc_classes', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('AccountClass');
            $table->integer('UseLife');
        });

        DB::table('acc_classes')->insert([
            ['AccountClass' => 'Wood', 'UseLife' =>  10],
            ['AccountClass' => 'Mixed', 'UseLife' =>  20],
            ['AccountClass' => 'Concrete', 'UseLife' =>  30],
            ['AccountClass' => 'Library Books', 'UseLife' =>  5],
            ['AccountClass' => 'Dental Equipment', 'UseLife' => 10],
            ['AccountClass' => 'Laboratory Equipment', 'UseLife' => 10],
            ['AccountClass' => 'Machineries', 'UseLife' => 10],
            ['AccountClass' => 'Agricultural, Fishery and Forestry', 'UseLife' => 10],
            ['AccountClass' => 'Computer Monitor', 'UseLife' => 7],
            ['AccountClass' => 'Keyboard', 'UseLife' => 10],
            ['AccountClass' => 'Projector', 'UseLife' => 5],
            ['AccountClass' => 'Fire Extinguisher', 'UseLife' => 5],
            ['AccountClass' => 'Basketball Hoop', 'UseLife' => 10],
            ['AccountClass' => 'Land Improvements', 'UseLife' => 10],
            ['AccountClass' => 'Railways', 'UseLife' => 40],
            ['AccountClass' => 'Runways/taxiways', 'UseLife' => 20],
            ['AccountClass' => 'Office Equipment', 'UseLife' => 10],
            ['AccountClass' => 'Furniture and Fixtures', 'UseLife' => 10],
            ['AccountClass' => 'IT Equipment', 'UseLife' => 10],
            ['AccountClass' => 'Airport Equipment', 'UseLife' => 10],
            ['AccountClass' => 'Electrification', 'UseLife' => 10],
            ['AccountClass' => 'Power and Energy Structures', 'UseLife' => 10],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acc_classes');
    }
};
