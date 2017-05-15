<?php

namespace App\models;


/**
 * Class DTUsers
 * @package App\models
 */
class DTUsers extends CoreModel
{
    /**
     * @var table name
     */
    protected $table = 'dt_users';

    /**
     * @var tables fillables
     */
    protected $fillable = ['id', 'name', 'email', 'password'];
}
