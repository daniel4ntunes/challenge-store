<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * @var string
     */
    protected $table = 'Cart';

    /**
     * @var bool
     */
    public $timestamps = false;
}
