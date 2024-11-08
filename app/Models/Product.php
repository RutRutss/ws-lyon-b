<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_fr',
        'description_en',
        'description_fr',
        'gtin',
        'brand',
        'country_of_origin',
        'weight_gross',
        'weight_net',
        'weight_unit',
        'company_id',
        'img',
        'is_hide'
    ];
}
