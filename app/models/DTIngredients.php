<?php

namespace App\models;


/**
 * Class DTIngredients
 * @package App\models
 */
class DTIngredients extends CoreModel
{
    protected $table = 'dt_ingredients';
    protected $fillable = ['id', 'name', 'calories'];
}
