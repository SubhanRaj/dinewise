<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerLoyaltyPointsModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "customer_loyalty_points";
    protected $primaryKey = "id";
}
