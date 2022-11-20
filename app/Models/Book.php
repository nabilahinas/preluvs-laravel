<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory, Sluggable;

    protected $table = "books";

    protected $guarded = [
        'id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function seller(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    } 

    // public function buyer(){
    //     return $this->belongsTo(User::class, 'buyer_id');
    // }

    // public function wishlist(){
    //     return $this->belongsToMany(User::class, 'wishlists', 'book_id', 'id');
    // }

}
