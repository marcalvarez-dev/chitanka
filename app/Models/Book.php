<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    /** Sirve para indicar que campos son cumplimentables */
    protected $fillable = ["genre", "title", "book_language"];

    /** Sirve para idnicar campos protegidos, lo contrario a filalble*/
    //protected $guarded = ["id"];

    /**Sirve para ocultar datos, para no entregar esta ifnormacion */
    //protected $hidden = ['password'];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function editions(): HasMany
    {
        return $this->hasMany(Edition::class);
    }
}
