<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSpec extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'cc',
        'silinder',
        'tipe_mesin',
        'torsi_max',
        'transmisi',
        'tipe',
        'pendingin',
        'suplay',
        'diameter',
        'daya_max',
        'susunan_silinder',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
