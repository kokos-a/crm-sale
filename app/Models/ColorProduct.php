<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ColorProduct extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',

    ];
    public function colors()
    {
        return $this->hasMany(ColorProduct::class);
    }
    public function creater() {
        return $this->belongsTo(User::class);
    }
    public function updater() {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::creating(function (ColorProduct $color) {
            if (Auth::check()) {
                $color->creater_id = Auth::id();
            }
        });
    }
}
