<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'fullname',
    'registered_at',
    'expires_at',
    'phone',
    'email',
    'status',
    'user_id',
])]
#[Table('members')]
#[Hidden([
    'email',
    'phone'
])]
class Member extends Model
{
    use HasFactory,SoftDeletes;

    protected $cast = [
        'registered_at'=> 'date',
        'expires_at'=> 'date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
