<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        use HasFactory;
        protected $fillable = ['title', 'description', 'price', 'quantity', 'is_featured','category_id'];

        public function images()
        {
            return $this->hasMany(ProductImage::class);
        }
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
    }
