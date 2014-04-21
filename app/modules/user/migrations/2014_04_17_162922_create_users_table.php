<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->increments('user_id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->timestamp('birthday');
            $table->timestamp('last_login');
            $table->integer('group_id')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('password');
<<<<<<< HEAD
            $table->text("token")->nullable();
=======
>>>>>>> 0d9045df9ad2f0d8d819b5b30a2e02f124b5c3cd
            $table->timestamps();
            $table->softDeletes();
			//
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
