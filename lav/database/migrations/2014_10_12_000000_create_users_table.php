<?php

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
            $table->bigIncrements('id');
            //Main information
            $table->string('username',100)->unique();
            $table->string('email',100)->unique();
            $table->string('password',256);
            //Extra information
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->text('details')->nullable();
            $table->string('avatar',1024)->nullable();
            //Option information
            $table->boolean('administrator')->default(0);
            $table->boolean('status')->default(1);
            //Automatic information
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
