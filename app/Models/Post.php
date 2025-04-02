<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'text',
        'image'
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];
}
