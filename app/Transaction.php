<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * @var string
     */
    protected $table = 'Transaction';

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $dates = [
        'date_added',
    ];

    protected $fillable = ['date_added', 'customer_id', 'total'];
}
