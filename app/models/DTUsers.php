<?php

namespace App\models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class DTUsers
 * @package App\models
 */
class DTUsers extends Authenticatable
{
    use Notifiable;

    /**
     * @var table name
     */
    protected $table = 'dt_users';

    /**
     * @var tables fillables
     */
    protected $fillable = ['id', 'name', 'email', 'phone', 'password'];

    public function getFillable() {

        unset($this->fillable[0]);
        return $this->fillable;

    }

    public function getTableName()
    {
        $tableName = substr($this->table, 3);
        return $tableName;
    }
}
