<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ApiTokenController extends Controller
{
    public function update(Request $request)
    {
        dd($request->user());
        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }

    public function logout(Request $r, $id) {

        \App\User::find($id)->forceFill([
            'api_token' => null
        ])->save();
        return [
            'status' => 0,
            'data' => []
        ];
    }
}
