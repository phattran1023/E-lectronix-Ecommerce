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
        'violence',
        'hate',
        'suicide',
        'misinformation',
        'frauds',
        'deceptive',
        'else',

    ];

    public function comment(){
        return $this->belongsTo(Comment::class,'report_id','id');
    }
   
    
}
