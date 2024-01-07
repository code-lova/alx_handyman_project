<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTypes extends Model
{
    use HasFactory;
    protected $table = 'job_types';
    protected $fillable = [
        'catId',
        'name',
        'slug',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function jobCats()
    {
        return $this->belongsTo(JobCategory::class, 'catId', 'id');
    }
}
