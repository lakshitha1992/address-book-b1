<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Drop the photo column if it already exists (this will not affect existing data)
            $table->dropColumn('photo');
            
            // Add the photo column again, this time as a string to store the file path
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Reverse the changes made in the up() method
            $table->dropColumn('photo');
        });
    }
};