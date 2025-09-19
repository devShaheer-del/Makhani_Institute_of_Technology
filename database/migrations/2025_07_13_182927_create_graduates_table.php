<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('graduates', function (Blueprint $table) {
        $table->id();
        $table->string("StudentID"); // ❌ no unique, multiple allowed
        $table->string('name');
        $table->string('father_name');
        $table->string('course');
        $table->date('graduation_date');
        $table->string('grade');
        $table->timestamps();

        // Foreign key constraint (link StudentID -> users.Personal_ID)
        $table->foreign('StudentID')
              ->references('Personal_ID')
              ->on('users')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduates');
    }
};
