<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class DTRolesPermissionsConnections
 * @package App\models
 */
class DTRolesPermissionsConnections extends Model
{
    protected $table = 'dt_roles_permissions_connections';
    protected $fillable = ['permissions_id', 'roles_id'];
}
