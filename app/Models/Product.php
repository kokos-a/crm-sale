<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    const PA = [
        0 => 'Pieces',
        1 => 'Kilogram',
        2 => 'm3'
    ];

    protected $fillable = [

        'title',
        'quantity',
        'type',
        'price',
        'color_id',
    ];
    public function getTAttribute()
    {
        return self::PA[$this->quantity];
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function creater() {
        return $this->belongsTo(User::class);
    }
    public function updater() {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::creating(function (Product $product) {
            if (Auth::check()) {
                $product->creater_id = Auth::id();
            }
        });
    }
}
