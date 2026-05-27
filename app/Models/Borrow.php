<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Table('borrows')]
#[Fillable([
    'member_id',
    'staff_id',
    'book_id',
    'borrow_date',
    'deadlines',
    'fine_id',
    'fine_total',
    'status',
])]
class Borrow extends Model
{
    use HasFactory,SoftDeletes;

    protected $cast = [
        'borrow_date' => 'date',
        'deadlines' => 'date',
    ];

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }

    public function fine() {
        return $this->belongsTo(Fine::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
