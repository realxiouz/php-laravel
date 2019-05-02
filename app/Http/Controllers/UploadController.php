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
        return ['status'=>0, 'data'=>$url];
    }
}
