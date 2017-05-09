<?php

namespace App\models;


/**
 * Class DTPermissions
 * @package App\models
 */
class DTPermissions extends CoreModel
{
    protected $table = 'dt_permissions';
    protected $fillable = ['id', 'name'];
}
