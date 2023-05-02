<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Profiler\Profile;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['comment', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }    
    
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }

  
}
