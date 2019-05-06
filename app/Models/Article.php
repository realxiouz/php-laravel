<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function tag() {
        return $this -> belongsTo('App\Models\Tag');
    }

    protected $fillable = ['title', 'body', 'user_id', 'tag_ids', 'markdown'];
}
