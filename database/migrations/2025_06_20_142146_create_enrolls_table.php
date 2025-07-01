<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number', 20); // Allow up to 20 characters
            $table->string('email');
            $table->integer('age'); // Fixed: should be integer
            $table->string('gender');
            $table->string('education');
            $table->string('course');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrolls');
    }
};
