<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomersModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "customers";
    protected $primaryKey = "id";
}
