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

    protected $fillable = ['session_id', 'product_id', 'date', 'quantity', 'unit_price', 'ip'];
}
