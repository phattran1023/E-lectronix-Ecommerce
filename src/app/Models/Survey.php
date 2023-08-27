<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['question','ans_a','ans_b','ans_c','ans_d','correct'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'survey_users', 'survey_id', 'user_id');
    }
}
