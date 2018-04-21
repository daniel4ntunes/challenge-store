<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionAddress extends Model
{
    /**
     * @var string
     */
    protected $table = 'TransactionAddress';

    /**
     * @var bool
     */
    public $timestamps = false;
}
