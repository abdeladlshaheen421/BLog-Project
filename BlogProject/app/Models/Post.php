<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'author',
        'user_id',
    ];
    // user fn used for to get object of user in calling post object
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}