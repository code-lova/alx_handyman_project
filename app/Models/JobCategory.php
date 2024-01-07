<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $table = 'job_categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];

    public function jobType()
    {
        return $this->hasMany(JobTypes::class, 'catId', 'id');
    }

    public function jobPost(){

        return $this->hasMany(Jobs::class, 'job_category', 'id');
    }
}
