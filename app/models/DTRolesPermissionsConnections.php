<?php

namespace App\models;


/**
 * Class DTRolesPermissionsConnections
 * @package App\models
 */
class DTRolesPermissionsConnections extends CoreModel
{
    protected $table = 'dt_roles_permissions_connections';
    protected $fillable = ['permissions_id', 'roles_id'];
}
