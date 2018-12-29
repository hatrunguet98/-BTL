<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('img')->nullable();
            $table->string('class')->nullable();
            $table->integer('role')->default(1);
            $table->integer('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
        });

        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('evaluate')->nullable();
            $table->string('comment')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Schema::create('user_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('survey_id')->nullable();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('subject_id')->nullable();
            $table->string('name')->nullable();
            $table->string('code');
            $table->string('semester');
            $table->string('status')->default(0);
            $table->string('criterion')->nullable();
            $table->datetime('start')->nullable();
            $table->datetime('finish')->nullable();
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
        });

        Schema::create('criteria', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->integer('status')->default(1);
        });

        Schema::create('semesters', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('surveys');
        Schema::dropIfExists('user_courses');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('criteria');
        Schema::dropIfExists('semesters');
    }
}
