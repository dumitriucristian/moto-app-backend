<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'status',
        'description',
        'start_date',
        'end_date'

    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
