<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    protected $table = 'recipes';

    protected $fillable = [
        'title',
        'text',
        'image'
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];
}
