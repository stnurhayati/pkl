<?php

namespace App\Models\SNU;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nis', 'name','birth_date','gender','class_id','phone','address',
    ];
     protected $table = 'snu_students';
}
