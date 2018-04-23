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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function address()
    {
        return $this->hasOne(TransactionAddress::class);
    }

    public function product()
    {
        return $this->hasMany(TransactionProduct::class);
    }
}
