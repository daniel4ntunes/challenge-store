<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionProduct extends Model
{
    /**
     * @var string
     */
    protected $table = 'TransactionProduct';

    /**
     * @var bool
     */
    public $timestamps = false;
}
