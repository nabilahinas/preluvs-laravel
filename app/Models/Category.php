<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [
        'category_id'
    ];

    protected $primaryKey = 'category_id';

    public function books(){
        return $this->hasMany(Book::class, 'category_id');
    }
}
