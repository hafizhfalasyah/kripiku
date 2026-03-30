<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function curren(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->price, thousands_separator: '.'),
        );
    }

    public function pricePerItem(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->price/$this->quantity, thousands_separator: '.'),
        );
    }

    public function totalPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->price/$this->quantity, thousands_separator: '.'),
        );
    }
}
