<?php

namespace App\models;


class DTPizzas extends CoreModel
{
    protected $table ='dt_pizzas';

    protected $fillable = ['id', 'name', 'calories', 'cheeses_id', 'pads_id', 'user_id', 'comment'];
}
