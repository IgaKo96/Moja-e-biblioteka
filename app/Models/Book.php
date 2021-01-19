<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function grades()
    {
    	return $this->hasMany(Grade::class);
    }

    public function statuses()
    {
    	return $this->hasMany(Status::class);
    }
}
