<?php

namespace App\models;


/**
 * Class DTPizzas
 * @package App\models
 */
class DTPizzas extends CoreModel
{
    protected $table = 'dt_pizzas';
    protected $fillable = ['id', 'pads_id', 'cheeses_id', 'user_id', 'name', 'calories', 'comment'];
}
