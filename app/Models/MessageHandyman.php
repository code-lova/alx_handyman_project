<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageHandyman extends Model
{
    use HasFactory;
    protected $table = 'message_handymen';
    protected $fillable = [

        'userId',
        'message',
        'email',
        'subject',
        'status'
    ];


    public function userName(){

        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
