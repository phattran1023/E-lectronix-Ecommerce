<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token, $this->userDetail->name));
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
        'role_as'
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
        'password' => 'hashed',
    ];

    public function userDetail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }
    

    public function surveys()
    {
        return $this->belongsToMany(Survey::class, 'survey_users', 'user_id', 'survey_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'id','post_id');
    }
    public function reported_comments()
    {
        return $this->hasMany(ReportComment::class, 'id', 'report_id');
    }
    public function replies(){
        return $this->hasMany(Reply::class, 'user_id','id');
    }
}