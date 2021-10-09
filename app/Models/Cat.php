<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'img',
        'type',
        'location',
        'age',
        'price'
    ];

    public function catType() {
        return $this->hasOne(CatType::class, 'name', 'type');
    }
}
