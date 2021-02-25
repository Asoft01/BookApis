<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Author extends Model
{
    //
    protected $fillable = ['book_id'];
    public function books() {
        return $this->hasMany(App\Book::class);
    }
}
