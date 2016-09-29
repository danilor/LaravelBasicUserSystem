<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->comment('The user that generates the email');
            $table->string("subject");
            $table->string('template')->nullable()->comment("The template used. This can be empty in cases when we are not using any template");
            $table->string('from_email');
            $table->string('from_name');
            $table->string('to_email');
            $table->string('to_name');
            $table->longText('body')->comment("The body of the email, without the html");
            // $table->longText('html')->comment("The body of the email, including the html");
            $table->boolean('sent')->default(0);
            $table->dateTime('sent_date')->nullable();
            $table->longText('result')->nullable()->coment("We want to store the result of the email in case we are using an external service");
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
        Schema::dropIfExists('emails');
    }
}
