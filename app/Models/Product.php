<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'image',
        'status',
        'is_favorite'

    ];

    // protected $guarded = [];

    //this is the accesser
    // protected function status(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ($value == 1) ? 'Active' : 'Inactive',
    //     );
    // }

    //under score ulla value coulumn name anegil camel case aki write cheytha they know .

    // protected function isFavorite(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ($value == 1) ? 'Yes' : 'No',
    //     );
    // }

    //extre coulumn uppends
    public function getStatusTextAttribute()
    {
        return ($this->status == 1) ? 'Active' : 'Inactive';
    }

    //appends  coulumn for is fav
    public function getIsFavoriteTextAttribute()
    {
        return ($this->is_favorite == 1) ? 'Yes' : 'No';
    }
    protected $appends = ['status_text', 'is_favorite_text'];



    //hasone relation to catgory
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
