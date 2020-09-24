<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function scopeSort($query, $order) {
        if(request()->has('sort')) {
            return $query->orderBy(request()->query('sort'), $order);
        }
        return $query;
    }

    public function author() {
        return $this->belongsToMany(Author::class, 'book_authors');
    }
}
