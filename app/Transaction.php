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
}
