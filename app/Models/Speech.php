<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speech extends Model
{
    protected $fillable = [
        'member_id',
        'session_id',
        'speech_content',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    use HasFactory;
}
