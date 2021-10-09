<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatType extends Model
{
    use HasFactory;

    protected $table = 'cat_types';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;

    public function cats() {
        return $this->hasMany(Cat::class, 'type', 'name');
    }
}
