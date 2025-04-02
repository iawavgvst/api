<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'price'
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];
}
