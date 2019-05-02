<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gather;

class GatherController extends Controller
{
    public function index(Request $r) {
        $pageSize = $r -> input('pageSize');
        return ['status'=>0, 'msg'=>'success', 'data'=> Gather::withTrashed()->paginate($pageSize)];
    }

    public function store(Request $r) {
        $gather = new Gather;
        $gather->title = $r->input('title');
        $gather->tag = $r->input('tag');
        $gather->body = $r->input('body');
        $gather->origin = $r->input('origin');
        $gather->save();
        return ['status'=>0, 'msg'=>'success'];
    }

    public function show(Request $r, $id) {
        return ['status'=>0, 'data'=> Gather::find($id)];
    }

    public function destroy(Request $r, $id) {
        $gather = Gather::withTrashed()->find($id);
        if ($gather->deleted_at) {
            return ['status'=>0, 'msg' => 'restore success', 'data'=> $gather->restore()];
        }
        return ['status'=>0, 'msg' => 'delete success', 'data'=> $gather->destroy($id)];
    }

    public function update(Request $r, $id) {
        $gather = Gather::find($id);
        $gather->title = $r->input('title');
        $gather->tag = $r->input('tag');
        $gather->body = $r->input('body');
        $gather->origin = $r->input('origin');
        $gather->save();
        return ['status'=>0, 'msg'=>'success'];
    }
}
