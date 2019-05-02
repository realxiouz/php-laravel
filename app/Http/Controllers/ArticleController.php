<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $r) {
        $pageSize = $r -> input('pageSize');
        return ['status' => 0, 'data' => Article::paginate($pageSize)];
    }

    public function store(Request $r){
        $r->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $post = new Article;
        $post->title= $r->input('title');
        $post->body= $r->input('body');
        $post->user_id= 1;
        $post->tag_ids =json_encode( $r -> input('tag_ids') );
        $post->markdown = $r -> input('markdown');
        $post->save();
        return ['status' => 0, 'msg' => 'success'];
    }

    public function show(Request $r, $id) {
        $post = Article::find($id);
        $post->tag=$post->tag;
        return ['status' => 0, 'msg' => 'success', 'data' => $post];
    }

    public function update(Request $r, $id) {
        $post = Article::find($id);
        $post->title= $r->input('title');
        $post->body= $r->input('body');
        $post->user_id= 1;
        $post->tag_ids =json_encode( $r -> input('tag_ids') );
        $post->save();
        return ['status' => 0, 'msg' => 'success'];
    }
}
