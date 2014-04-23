<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permission extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('permissions', function(Blueprint $table)
        {
            $table->increments('permission_id');
            $table->string('permission_name',250)->unique();
            $table->text('permission_description')->nulable();
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();
            //
            Schema::create('group_permissions', function(Blueprint $table)
            {
                $table->integer('permission_id');
                $table->integer('group_id');
                $table->primary(array('permission_id','group_id'));
            });
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('permissions');
        Schema::drop('group_permissions');
	}

}
