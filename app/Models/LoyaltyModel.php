<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoyaltyModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "loyalty";
    protected $primaryKey  = "id";
}
