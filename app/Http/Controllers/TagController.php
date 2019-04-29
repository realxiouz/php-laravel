<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    protected $hidden = ['created_at', 'updated_at', 'pid'];

    public function index() {
        return Tag::all()->toArray();;
    }

    public function show($id) {
        return Tag::find($id);
    }

    public function tree() {
        $roots = Tag::where("pid", null)->get();
        foreach($roots as $item){
            $item->children = Tag::where('pid', $item->id)->get();
        }
        return $roots;
    }
}
