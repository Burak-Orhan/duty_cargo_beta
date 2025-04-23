<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $fillable = [
        "id",
        "name",
        "city",
        "state",
        "post_date",
        "country",
    ];
}
