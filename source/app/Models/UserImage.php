<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    protected $table = ['user_img'];
    protected $fillable = ['name','user_img_id'];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    
}
