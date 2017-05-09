<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class DTPizzaIngredientsConnections
 * @package App\models
 */
class DTPizzaIngredientsConnections extends Model
{
    protected $table = 'dt_pizzas_ingredients_connections';
    protected $fillable = ['pizzas_id', 'ingredients_id'];
}
