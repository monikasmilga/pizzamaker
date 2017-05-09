<?php

namespace App\models;


/**
 * Class DTUsersRolesConnections
 * @package App\models
 */
class DTUsersRolesConnections extends CoreModel
{
    protected $table = 'dt_users_roles_connections';
    protected $fillable = ['users_id', 'roles_id'];
}
