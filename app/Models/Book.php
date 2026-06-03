<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'year',
        'publisher',
        'cover',
        'city',
        'bookshelf_id'
    ];

    // relasi many to one dengan model Bookshelf
    // inverse -> belongsTo
    public function bookshelf() : BelongsTo
    {
        return $this->belongsTo(Bookshelf::class, 'bookshelf_id', 'id');
    }
}
