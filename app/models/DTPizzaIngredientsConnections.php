<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class DTPizzaIngredientsConnections
 * @package App\models
 */
class DTPizzaIngredientsConnections extends Model
{
    /**
     * @var table name
     */
    protected $table = 'dt_pizzas_ingredients_connections';

    /**
     * @var tables fillables
     */
    protected $fillable = ['pizzas_id', 'ingredients_id'];

}
