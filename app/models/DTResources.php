<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DTResources extends CoreModel {

    protected $table = 'dt_resources';

	protected $fillable = ['id', 'mime_type', 'path', 'size', 'width', 'height'];

}
