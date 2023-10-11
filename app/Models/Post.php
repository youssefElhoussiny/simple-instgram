<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['description' , 'slug' , 'image'];
    public function owner()
    {
        return $this->belongsTo(User::class , foreignKey:'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
