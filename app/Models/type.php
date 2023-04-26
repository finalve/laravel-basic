<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_ref_id');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class,'Post_type','post_id');
    }

    protected $fillable = [
        'name',
    ];
}
