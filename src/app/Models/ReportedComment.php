<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedComment extends Model
{
    use HasFactory;

    protected $table ='reported_comment';
    protected $fillable = [
        'report_id',
        'reporter_id',
        'user_comment',
        'badwords',
        'spamming',
        'attitude',
        'else',

    ];
    
}
