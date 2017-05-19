<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DTUsersResourcesConnections extends CoreModel {

	protected $fillable = ['id', 'users_id', 'resources_id'];

	protected $table = 'dt_users_resources_connections';
}
