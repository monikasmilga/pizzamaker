<?php

namespace App\models;

class DTCheeses extends CoreModel
{
    protected $table ='dt_cheeses';

    protected $fillable = ['id', 'name', 'calories'];
}
