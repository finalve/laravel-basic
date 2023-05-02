<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }

    public function profile()
    {
        return $this->hasOne(ProfileUpload::class)->latest();
    }

    public function personal()
    {
        return $this->hasOne(Personal::class);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class,'friends','friend_id','user_id')->withPivot('friend_id','status')->withTimestamps();
    }

    public function getFriends()
    {
        return $this->belongsToMany(User::class,'friends','friend_id','user_id')->where('status','accepted')->select('name','friends.id')->withTimestamps();
    }

    public function getPending()
    {
        return $this->belongsToMany(User::class,'friends','user_id','friend_id')->where('status','pending')->select('name','friends.id')->withTimestamps();
    }

    public function friendsrequest()
    {
        return $this->belongsToMany(User::class,'friends','friend_id','user_id')->where('status','pending')->select('name','friends.id')->withTimestamps();
    }

    public function addfriends()
    {
        return $this->belongsToMany(User::class,'friends','user_id','friend_id')->withTimestamps();
    }

    public function acceptedfriend(){
        return $this->belongsToMany(User::class, 'friendship','friend_id','user_id',)
        ->withTimestamps();
    }
    
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
