<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewList extends Model
{
    use HasFactory;

//    protected $guardian = [
//        '_token',
//    ];

    protected $fillable = [
        'title',
        'text',
        'image',
        'big_image',
    ];

    public function newsList()
    {
        return $this->hasMany(new_lists::class);
    }
}
