<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'book_code',
    'title',
    'category_id',
    'release_date',
    'writer_name',
    'isbn',
    'input_date ',
])]
#[Table('books')]
class Book extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $cast = [
        'release_date' => 'date',
        'input_date' => 'date'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
