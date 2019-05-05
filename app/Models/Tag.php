<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pid'];

    protected $appends = ['children'];

    public function getChildrenAttribute(){
        return $this->where('pid', $this->id)->get()->count() ? $this->where('pid', $this->id)->get() : null;
    }
}
