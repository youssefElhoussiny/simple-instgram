<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body' , 'user_id'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class,foreignKey:'user_id');
    }
}
