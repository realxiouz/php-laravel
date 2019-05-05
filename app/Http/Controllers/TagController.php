<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    public function index() {
        $roots = Tag::where("pid", null)->get();
        // foreach($roots as $item){

        //     // $item->children = Tag::where('pid', $item->id)->get();
        //     // foreach($item->children as $i) {
        //     //     $i->children = Tag::where('pid', $i->id)->get();
        //     // }

        //     Tag::where('pid', $item->id)->get()->count() ? $item->children = Tag::where('pid', $item->id)->get() : '';
        //     if ($item->children) {
        //         foreach($item->children as $i) {
        //             Tag::where('pid', $i->id)->get()->count() ? $i->children = Tag::where('pid', $i->id)->get() : '';
        //         }
        //     }
        // }
        return ['status' => 0, 'msg' => 'success', 'data' => $roots];
    }

    public function show($id) {
        return Tag::find($id);
    }

    public function store(Request $r) {
        $r->validate([
            'name'=> 'required',
        ]);
        $name = $r->input('name');
        $pid = $r->input('pid') ?: null;
        $tag = new Tag;
        $tag->name = $name;
        $tag->pid  = $pid;
        $tag->save();
        return ['status' => 0, 'msg' => 'success'];
    }

    public function destroy(Request $r, $id) {
        $data = Tag::destroy($id);
        return ['status' => 0, 'msg' => 'success', 'data' => $data];
    }
}
