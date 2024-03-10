<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "products";
    protected $primaryKey = "id";

    public function category(): HasOne
    {
        return $this->hasOne(ProductCategory::class, 'cat_id', 'cat_id');
    }
}
