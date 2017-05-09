<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

/**
 * Class CoreModel
 * @package App\models
 */
class CoreModel extends Model
{

    /**
     * Incrementing is set to false
     *
     * @var bool
     */
    public $incrementing = false;

    use SoftDeletes;

    /**
     * Automatically generates and adds UUID to model
     */
    protected static function boot() : void {
        parent::boot();
        static::creating(function($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4();
        });
    }
}
