<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
        'expiration_date',
        'user_id',
        'price',
        'new_price',
        'quantity',
        'contact_informations',
        'views',
        'category',

    ];

}
