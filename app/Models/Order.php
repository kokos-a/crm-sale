<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    const TA = [
        0 => 'Status A',
        1 => 'Status B',
        2 => 'Status C',
        3 => 'Status D',
    ];

    protected $attributes = ['client_id' => 0, 'type' => 1];

    protected $fillable = [
        'client_id',
        'organisation',
        'about',
        'type'
    ];
    public function getTAttribute()
    {
        return self::TA[$this->type];
    }


    public function client() { // от кого заявка
        return $this->belongsTo(Client::class);
    }


    public function creater() { // пользователь - создатель
        return $this->belongsTo(User::class);
    }

    public function updater() { // последний пользователь, обновивший модель
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function (Order $order) {
            if (Auth::check()) {
                $order->creater_id = Auth::id();
            }
        });
    }
}
