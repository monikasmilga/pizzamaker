<?php

namespace App\models;


class DTUsers extends CoreModel
{
    protected $table = 'users';
    protected $fillable = ['id', 'name', 'email', 'password'];
}
