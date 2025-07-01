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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('form_no');
            $table->string('reg_no');
            $table->date('date');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('guardian_name');
            $table->date('dob');
            $table->integer('age');
            $table->string('cnic');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('mobile');
            $table->string('home_contact')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->json('courses');  // will store multiple courses as JSON
            $table->string('documents');
            $table->string('terms');
            $table->boolean('signature')->default(false);
            $table->json('course_timings')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
