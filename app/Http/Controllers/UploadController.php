<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $r) {
        $folderName = 'public/uploads';
        $path = $r->file('file')->store($folderName);

        $url = Storage::url($path);

        // $path1 = Storage::disk('public')->put('test/123',$r->file('file'));
        // dd($url, $path1);
        return ['status'=>0, 'data'=>$url];
    }
}
