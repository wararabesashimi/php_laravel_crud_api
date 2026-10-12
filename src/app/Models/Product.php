<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
        ];
    }
}