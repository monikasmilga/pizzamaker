<?php

namespace App\models;


class DTUsers extends CoreModel
{
    protected $table ='dt_users';

    protected $fillable = ['id', 'name', 'password', 'email', 'phone', ];
}
