<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'description', 'menu_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
