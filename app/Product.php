<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    /**
     * @var string
     */
    protected $table = 'Product';

    /**
     * @var bool
     */
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
