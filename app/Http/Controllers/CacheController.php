<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function index()
    {
        $key = 'key_123';

        if (!Cache::has($key)) {
            Cache::put($key, 'baz123456');
        }

        $value = Cache::get($key);

        dd(
            $value
        );
    }
}
