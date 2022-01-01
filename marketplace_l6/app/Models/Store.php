<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = ['name', 'slug', 'phone', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * store has many products
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
