<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratings extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = ['customerId','handymanId','star_rating'];

    public function handyman()
    {
        return $this->belongsTo(User::class, 'handymanId', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customerId', 'id');
    }
}
