<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory; 

    protected $fillable = [
        'user_id',
        'title',
        'code',
        'about'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
