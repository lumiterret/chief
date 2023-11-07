<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'instructions',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot('note');
    }

}
