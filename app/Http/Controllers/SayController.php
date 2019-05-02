<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Say;

class SayController extends Controller
{
    public function store(Request $r) {
        $say = new Say;
        $say->content = $r->input('content');
        $say->img = $r->input('img');
        $say->user_id = 1;
        $say->save();
        return ['status'=>0];
    }

    public function index(Request $r) {
        $pageSize = $r->input('pageSize');
        $data = Say::withTrashed()->paginate($pageSize);
        return ['status'=>0, 'data'=>$data];
    }
}
