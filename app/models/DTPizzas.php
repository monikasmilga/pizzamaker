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
    protected $fillable = ['id', 'pads_id', 'cheeses_id', 'user_id', 'name', 'calories', 'comment'];

    public function pads()
    {
        return $this->hasOne(DTPads::class, 'id', 'pads_id');
    }
    public function cheeses()
    {
        return $this->hasOne(DTPizzas::class, 'id', 'cheeses_id');
    }
    public function ingredients()
    {
        return $this->hasMany(DTPizzasIngredientsConnections::class, 'pizzas_id', 'id')->with('ingredients');
    }
    public function ingredientsForSync()
    {
        return $this->belongsToMany(DTIngredients::class, 'pizzas_ingredients_connections', 'pizzas_id', 'ingredients_id');
    }


}
