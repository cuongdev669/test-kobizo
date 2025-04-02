<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'key', 'value'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
