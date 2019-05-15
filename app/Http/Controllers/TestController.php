<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function auth() {
        return [
            'status' => 0,
            'data' => [],
            'msg' => 'auth'
        ];
    }

    public function query(Request $r) {
        $r->validate([
            'name' => 'required',
            'age' => 'required'
        ]);

        return [
            'status' => 0,
            'data' => [],
            'msg' => 'query ok'
        ];
    }

    // public function notFound() {
    //     return [
    //         'status' => 0,
    //         'data' => [],
    //         'msg' => 'ok'
    //     ];
    // }

    public function ip(Request $r) {
        return [
            'status' => 0,
            'data' => [
                'ip' => $r->ip()
            ],
            'msg' => 'ip ok'
        ];
    }

    public function test(Request $r) {
        // return [
        //     'status' => 0,
        //     'data' => TestController::class, // test class
        //     'msg' => 'ip ok'
        // ];
    }

    public function event() {
        event(new \App\Events\TestEvent());
        return [
            'status' => 0,
            'data' => [],
            'msg' => 'event ok'
        ];
    }
}
