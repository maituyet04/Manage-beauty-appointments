<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'active'
    ];

    public function beauties()
    {
        return $this->hasMany(Beauty::class, 'menu_id', 'id');
    }
}
