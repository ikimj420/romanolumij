<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id')->nullable()->default('3');
            $table->string('name');
            $table->string('username')->unique()->default('-');
            $table->string('email')->unique();
            $table->string('birthDate')->nullable()->default('-');
            $table->string('site')->nullable()->default('-');
            $table->string('phones')->nullable()->default('-');
            $table->string('street')->nullable()->default('-');
            $table->string('city')->nullable()->default('-');
            $table->string('state')->nullable()->default('-');
            $table->mediumText('bio')->nullable();
            $table->string('avatar')->default('default.svg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')->on('roles')
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
        Schema::dropIfExists('users');
    }
}
