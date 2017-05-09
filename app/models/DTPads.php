<?php

namespace App\models;

/**
 * Class DTPads
 * @package App\models
 */
class DTPads extends CoreModel
{
    protected $table = 'dt_pads';
    protected $fillable = ['id', 'name', 'calories'];
}
