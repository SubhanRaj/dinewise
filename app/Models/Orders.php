<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "orders_details";
    protected $primaryKey = "id";

    public function customer(): HasOne
    {
        return $this->hasOne(CustomersModel::class, 'id', 'customer_id_or_booking_id');
    }
}
