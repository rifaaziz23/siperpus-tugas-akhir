<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookshelf extends Model  //tunggal: bookshelf -> jamak: bookshelves
{
    protected $fillable = [
        'code',
        'name'
    ];

    // relasi one to many dengan model Book
    // 1 rak buku memiliki banyak buku
    public function books() : HasMany
    {
        return $this->hasMany(Book::class, 'bookshelf_id', 'id');
    }
}
