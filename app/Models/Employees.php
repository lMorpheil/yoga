<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'previews',
        'img_modal',
        'name',
        'profession',
        'age_years',
    ];

    public function employees()
    {
        return $this->hasMany(employees::class);
    }
}
