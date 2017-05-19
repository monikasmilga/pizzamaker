<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDtUsersRolesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dt_users_roles_connections', function(Blueprint $table)
		{
			$table->foreign('roles_id', 'fk_dt_users_roles_connections_dt_roles1')->references('id')->on('dt_roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_dt_users_roles_connections_dt_users1')->references('id')->on('dt_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dt_users_roles_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_dt_users_roles_connections_dt_roles1');
			$table->dropForeign('fk_dt_users_roles_connections_dt_users1');
		});
	}
}
