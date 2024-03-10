<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReleasePayment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "released_payment";
}
