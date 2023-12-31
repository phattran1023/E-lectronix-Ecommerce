<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   use HasFactory;

   protected $table = 'comments';

   protected $fillable = [
    'post_id',
    'user_id',
    'user_name',
    'comment_body'
    
   ];
   public function product(){
      return $this-> belongsTo(Product::class,'post_id','id');
   }
   public function user(){
      return $this->belongsTo(User::class,'post_id','id');
   }
   public function likes()
   {
       return $this->hasMany(CommentLike::class);
   }
  
   public function isLikedByUser($user)
   {
       return $this->likes()->where('user_id', $user ? $user->id : null)->exists();
   }
   public function reported_comments(){
      return $this->hasMany(ReportedComment::class, 'id','report_id');
   }
   
   public function replies()
{
    return $this->hasMany(Reply::class, 'origin_comment_id', 'id');
}
  
}
