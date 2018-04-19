<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'Product';

    /**
     * @var bool
     */
    public $timestamps = false;
}
