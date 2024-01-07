<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobContacted extends Model
{
    use HasFactory;
    protected $table = 'job_contacteds';
    protected $fillable = [

        'userId',
        'name',
        'email',
        'details',
        'status',
        'job_title',
        'job_category',
        'job_type',
        'job_location',
        'start_date',
        'end_date'
    ];

    public function userName(){

        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
