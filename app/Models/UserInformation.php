<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'city',
        'state',
        'zip_code',
        'address',
        'district',
        "country"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
