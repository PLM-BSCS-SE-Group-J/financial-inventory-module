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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('AccountTitle');
            $table->string('AccountClass');
            $table->integer('UseLife');
            $table->unsignedBigInteger('acc_ID');
            $table->foreign('acc_ID')->references('id')->on('categories');
        });

        DB::table('products')->insert([
            ['AccountTitle'=> 'School Buildings', 'AccountClass' => 'Wood', 'UseLife' =>  10, 'acc_ID' => 1],
            ['AccountTitle'=> 'School Buildings', 'AccountClass' => 'Mixed', 'UseLife' =>  20, 'acc_ID' => 1],
            ['AccountTitle'=> 'School Buildings', 'AccountClass' => 'Concrete', 'UseLife' =>  30, 'acc_ID' => 1],
            ['AccountTitle'=> 'Books', 'AccountClass' => 'Library Books', 'UseLife' =>  5, 'acc_ID' => 13],
            ['AccountTitle'=> 'Medical Equipment', 'AccountClass' => 'Dental Equipment', 'UseLife' => 10, 'acc_ID' => 7],
            ['AccountTitle'=> 'Medical Equipment', 'AccountClass' => 'Laboratory Equipment', 'UseLife' => 10, 'acc_ID' => 7],
            ['AccountTitle'=> 'Other Machinery and Equipment', 'AccountClass' => 'Machineries', 'UseLife' => 10, 'acc_ID' => 10],
            ['AccountTitle'=> 'Other Machinery and Equipment', 'AccountClass' => 'Agricultural, Fishery and Forestry', 'UseLife' => 10, 'acc_ID' => 10],
            ['AccountTitle'=> 'Information and Communication Technology', 'AccountClass' => 'Computer Monitor', 'UseLife' => 7, 'acc_ID' => 4],
            ['AccountTitle'=> 'Information and Communication Technology', 'AccountClass' => 'Keyboard', 'UseLife' => 10, 'acc_ID' => 4],
            ['AccountTitle'=> 'Information and Communication Technology', 'AccountClass' => 'Projector', 'UseLife' => 5, 'acc_ID' => 4],
            ['AccountTitle'=> 'Disaster Response and Rescue Equipment', 'AccountClass' => 'Fire Extinguisher', 'UseLife' => 5 , 'acc_ID' => 5],
            ['AccountTitle'=> 'Sports Equipment', 'AccountClass' => 'Basketball Hoop', 'UseLife' => 10, 'acc_ID' => 8],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
