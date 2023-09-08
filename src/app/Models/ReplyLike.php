<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyLike extends Model
{
    use HasFactory;

    protected $table = 'reply_likes'; // Specify the table name if it's different

    protected $fillable = ['user_id', 'reply_id'];

    // Define relationships with users and comments
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reply()
    {
        return $this->belongsTo(Comment::class);
    }
}
