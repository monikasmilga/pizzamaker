<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDtPizzasUsersConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dt_pizzas_users_connections', function(Blueprint $table)
		{
			$table->foreign('pizzas_id', 'fk_dt_pizzas_users_connections_dt_pizzas1')->references('id')->on('dt_pizzas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_dt_pizzas_users_connections_dt_users1')->references('id')->on('dt_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dt_pizzas_users_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_dt_pizzas_users_connections_dt_pizzas1');
			$table->dropForeign('fk_dt_pizzas_users_connections_dt_users1');
		});
	}

}
