<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table = 'Reply';

   protected $fillable = [
    'origin_comment',
    'user_id',
    'user_name',
    'reply_body',
    
   ];
   public function getReply(){
    return $this->belongsTo(Comment::class,'origin_comment','id');
   }
}
