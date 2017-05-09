<?php

namespace App\models;


/**
 * Class DTPizzaIngredientsConnections
 * @package App\models
 */
class DTPizzaIngredientsConnections extends CoreModel
{
    protected $table = 'dt_pizzas_ingredients_connections';
    protected $fillable = ['pizzas_id', 'ingredients_id'];
}
