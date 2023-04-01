<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class posts extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(categorys::class);
    }

    // public function image(): Attribute
    // {
    //     return Attribute::make(
    //        get: fn ($value) => asset('storage/.$this->image'),
    //     );
    // }
}
