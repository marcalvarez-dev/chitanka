<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ["genre", "title", "book_language"];
    //protected $guarded = ["id"];
    //protected $hidden = ['password'];
}
