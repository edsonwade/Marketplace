<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['nome', 'slug', 'description', 'body', 'price'];

    /**
     * product belongsTo store
     */
    function store()
    {

        return $this->belongsTo(Store::class);
    }

    /**
     * product belongs to many categories'
     * produto pertence a muitas categorias ->pt
     */
    function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
