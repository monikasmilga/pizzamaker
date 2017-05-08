<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CoreModel extends Model
{
    public $incrementing = false;
    use SoftDeletes;
    protected static function boot() {
        parent::boot();
        static::creating(function($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4();
        });
    }
}
