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
    public function up()
    {
        DB::table('cards')->whereNull('Card_token')->update(['Card_token' => '']);
        Schema::table('cards', function (Blueprint $table) {
            // Change the column to TEXT or increase its size
            $table->text('Card_token')->change();
        });
    }

    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->string('Card_token', 254)->change(); // Adjust size back if needed
        });
    }
};
