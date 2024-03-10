<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricingUnit extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "pricing_units";
    protected $primaryKey = "id";
}
