<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * @var string
     */
    protected $table = 'ProductCategory';

    /**
     * @var bool
     */
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
