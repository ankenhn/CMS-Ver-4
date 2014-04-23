<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('menus', function(Blueprint $table)
        {
            $table->increments('menu_id');
            $table->string('menu_name',50);
            $table->integer('status');
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();
            //
            Schema::create('menu_items', function(Blueprint $table)
            {
                $table->increments('menu_item_id');
                $table->string('menu_item_name',50);
                $table->string('menu_item_url',255)->default('#');
                $table->string('menu_item_target',50)->default('_self');
                $table->string('menu_item_class',50)->nulable();
                $table->integer('menu_item_parent_id')->default(0);
                $table->integer('menu_id');
                $table->integer('status');
                $table->integer('user_id');
                $table->timestamps();
                $table->softDeletes();
                //
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
        Schema::drop('menus');
        Schema::drop('menu_items');
	}

}
