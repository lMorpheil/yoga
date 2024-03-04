<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'image',
        'big_image',
    ];

    public function newsList()
    {
        return $this->hasMany(actions::class);
    }
}
