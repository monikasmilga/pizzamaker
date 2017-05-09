<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class DTUsersRolesConnections
 * @package App\models
 */
class DTUsersRolesConnections extends Model
{
    protected $table = 'dt_users_roles_connections';
    protected $fillable = ['users_id', 'roles_id'];
}
