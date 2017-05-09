<?php

namespace App\models;


class DTPizzasIngredientsConnections extends CoreModel
{
    protected $table ='dt_pizzas_ingredients_connections';

    protected $fillable = ['id', 'name', 'calories'];
}
