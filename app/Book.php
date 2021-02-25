<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';

    protected $fillable = ['name', 'isbn', 'author_id', 'number_of_pages', 'publisher', 'country', 'released_date'];

    public function authors() {
        return $this->hasMany(App\Author::class);
    }
}
