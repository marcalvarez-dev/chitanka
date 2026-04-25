<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    /** Sirve para indicar que campos son cumplimentables */
    protected $fillable = [
        "title",
        "category_id",
        "author_id"
    ];

    /** Sirve para idnicar campos protegidos, lo contrario a filalble*/
    //protected $guarded = ["id"];

    /**Sirve para ocultar datos, para no entregar esta ifnormacion */
    //protected $hidden = ['password'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function editions(): HasMany
    {
        return $this->hasMany(Edition::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
