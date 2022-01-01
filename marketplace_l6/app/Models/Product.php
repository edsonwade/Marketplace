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
}
