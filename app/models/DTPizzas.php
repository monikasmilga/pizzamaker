<?php

namespace App\models;


/**
 * Class DTPizzas
 * @package App\models
 */
class DTPizzas extends CoreModel
{
    /**
     * @var table name
     */
    protected $table = 'dt_pizzas';

    /**
     * @var tables fillables
     */
    protected $fillable = ['id', 'name', 'calories', 'pads_id', 'cheeses_id', 'user_id', 'comment'];
}
