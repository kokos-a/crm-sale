<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{
    use HasFactory;
    const TA = [
        0 => 'Category A',
        1 => 'Category B',
        2 => 'Category C'
    ];

    protected $attributes = ['type' => 0, 'title' => ''];
    protected $fillable = [
        'firstname',
        'title',
        'lastname',
        'type',
        'organisation',
        'address',
        'email',
        'tel',
        'comment'

    ];
    public function getTAttribute()
    {
        return self::TA[$this->type];
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function creater() {
        return $this->belongsTo(User::class);
    }
    public function updater() {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::creating(function (Client $client) {
            if (Auth::check()) {
                $client->creater_id = Auth::id();
            }
        });
    }
}

