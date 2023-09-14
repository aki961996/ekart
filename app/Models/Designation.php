<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'designations';
    protected $fillable = [
        'name',
        'depertment_id',



    ];
}
