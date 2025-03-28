<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function subjects()  {
        return $this->hasMany(Subject::class);
    } 
}   
