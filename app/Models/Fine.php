<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Table("fines")]
#[Fillable([
    'fine_name',
    'amount',
])]
class Fine extends Model
{
    use HasFactory, SoftDeletes;
    
}
