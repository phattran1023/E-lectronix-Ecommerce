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
   public function reported_comments(){
      return $this->hasMany(ReportedComment::class, 'id','report_id');
   }
   
   public function replies(){
      return $this->hasMany(Reply::class,'id','orgin_comment_id');
   }
  
}
