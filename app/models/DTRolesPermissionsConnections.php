<?php

namespace App\models;


class DTRolesPermissionsConnections extends CoreModel
{
    protected $table ='dt_roles_permissions_connections';

    protected $fillable = ['roles_id', 'permissions_id',];
}
