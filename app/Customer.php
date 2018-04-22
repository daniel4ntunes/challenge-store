<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * @var string
     */
    protected $table = 'Customer';

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['name', 'email', 'cpf', 'phone'];
}
