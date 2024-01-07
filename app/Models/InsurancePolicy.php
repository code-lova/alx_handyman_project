<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePolicy extends Model
{
    use HasFactory;
    protected $table = 'insurance_policies';
    protected $fillable = [
        'userId',
        'policy_name',
        'image',
        'status'
    ];

    public function userName()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
