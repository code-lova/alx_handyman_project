<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = [
        'userId',
        'email',
        'job_title',
        'job_location',
        'job_type',
        'job_category',
        'job_description',
        'url',
        'image',
        'status',
        'expires_at'
    ];


    public function userName(){

        return $this->belongsTo(User::class, 'userId', 'id');
    }


    public function category(){

        return $this->belongsTo(JobCategory::class, 'job_category', 'id');
    }

    public function type(){

        return $this->belongsTo(JobTypes::class, 'job_type', 'id');
    }
}
