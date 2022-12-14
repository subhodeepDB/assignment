<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'description',
        'price',
        'user_id'
    ];

    public function user() {
        return $this->hasOne(User::class);
    }

}
