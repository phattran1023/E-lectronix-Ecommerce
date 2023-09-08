<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table = 'Replies';

    protected $fillable = [
        'origin_comment_id',
        
        'user_id',
        'user_name',
        'reply_body',

    ];
    public function comment()
{
    return $this->belongsTo(Comment::class, 'origin_comment_id', 'id');
}

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}