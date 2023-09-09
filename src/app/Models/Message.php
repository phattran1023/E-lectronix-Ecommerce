<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // ID của người gửi
        'content', // Nội dung tin nhắn
    ];

    // Định nghĩa mối quan hệ với người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
