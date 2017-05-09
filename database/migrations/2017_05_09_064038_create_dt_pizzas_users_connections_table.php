<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtPizzasUsersConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dt_pizzas_users_connections', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('pizzas_id', 36)->index('fk_dt_pizzas_users_connections_dt_pizzas1_idx');
			$table->string('users_id', 36)->index('fk_dt_pizzas_users_connections_dt_users1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dt_pizzas_users_connections');
	}

}
