<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Cargos extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "company_id",
        "customer_id",
        "tracking_code",
        "user_id",
        "status",
    ];
}
