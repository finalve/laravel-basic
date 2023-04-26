<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_ref_id');
    }

    public function types()
    {
        return $this->belongsToMany(type::class, 'Post_type','post_id','type_id');
    }
    
}
