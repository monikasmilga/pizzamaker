<?php

namespace App\models;


/**
 * Class DTRoles
 * @package App\models
 */
class DTRoles extends CoreModel
{
    protected $table = 'dt_roles';
    protected $fillable = ['id', 'name'];
}
