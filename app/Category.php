<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'Category';

    /**
     * @var bool
     */
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
