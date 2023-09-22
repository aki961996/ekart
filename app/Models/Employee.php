<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'gender',
        'dob',
        'address',
        'mobile',
        'email',
        'depertment_id',
        'designation_id',
        'doj',
        'image',


    ];

    //gender value chhnage appending

    public function getGenderTextAttribute()
    {
        if ($this->gender == 1) {

            return "Male";
        }
        if ($this->gender == 2) {
            return "Female";
        } else {
            return "Trancgender";
        }
    }

    // public function getStatusTextAttribute()
    // {
    //     if ($this->status == 1) return 'Active';
    //     else return 'Inactive';
    // }
    protected $appends = ['gender_text'];
}
