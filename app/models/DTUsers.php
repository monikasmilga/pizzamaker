<?php

namespace App\models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


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

    protected $hidden = [ 'password', 'remember_token'];
}
