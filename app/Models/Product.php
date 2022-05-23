<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'desc',
        'price',
        'tags',
        'category_id',
    ];


    public function galleries() {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function spec() {
        return $this->hasOne(ProductSpec::class, 'product_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
}
