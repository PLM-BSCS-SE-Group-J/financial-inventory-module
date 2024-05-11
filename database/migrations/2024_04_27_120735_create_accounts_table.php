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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('AccountTitle')->unique();
        });

        DB::table('accounts')->insert([
            ['AccountTitle'=> 'School Buildings'],
            ['AccountTitle'=> 'Other Structures'],
            ['AccountTitle'=> 'Office Equipment'],
            ['AccountTitle'=> 'Information and Communication Technology'],
            ['AccountTitle'=> 'Disaster Response and Rescue Equipment'],
            ['AccountTitle'=> 'Military, Police and Security Equipment'],
            ['AccountTitle'=> 'Medical Equipment'],
            ['AccountTitle'=> 'Sports Equipment'],
            ['AccountTitle'=> 'Technical and Scientific Equipment'],
            ['AccountTitle'=> 'Other Machinery and Equipment'],
            ['AccountTitle'=> 'Motor Vehicles'],
            ['AccountTitle'=> 'Furniture and Fixtures'],
            ['AccountTitle'=> 'Books'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
