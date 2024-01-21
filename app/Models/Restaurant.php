<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    protected $fillable = ['name', 'email', 'phone', 'website'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
