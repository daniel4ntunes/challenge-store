<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * @var string
     */
    protected $table = 'ProductCategory';

    /**
     * @var bool
     */
    public $timestamps = false;
}
