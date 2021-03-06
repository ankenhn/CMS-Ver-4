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
            $table->timestamp('birthday')->default(0);
            $table->timestamp('last_login')->default(0);
            $table->integer('role_id')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('password');
            $table->string('salt');
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
