<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','img','body','user_id','time','release_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
