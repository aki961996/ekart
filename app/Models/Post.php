<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    // protected $primaryKey = 'post_id';
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'slug',
        'body'
    ];

    public function categories(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
