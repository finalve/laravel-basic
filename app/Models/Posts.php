<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('name');
    }    

    public function comments()
    {
        return $this->hasMany(Comment::class,'pid');
    }

    protected $fillable = [
        'message',
        'img'
    ];

}
