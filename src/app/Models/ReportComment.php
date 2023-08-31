<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportComment extends Model
{
    use HasFactory;

    protected $table = 'reported_comment';
    protected $fillable = [
        'report_id',

        'comment_owner',
        'user_comment',
        'violence',
        'hate',
        'suicide',
        'misinformation',
        'frauds',
        'deceptive',
        'else',

    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'report_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}