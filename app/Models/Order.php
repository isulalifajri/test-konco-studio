<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    protected $appends = [
        'price_text'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function priceText(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $data) => 'Rp. ' . number_format($data['subtotal'], 0, ',', '.')
        );
    }
}
