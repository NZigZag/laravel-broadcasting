<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function index()
    {
        $key = 'cache_key';

        if (!Cache::has($key)) {
            Cache::put($key, 'baz_123456', now()->addMinutes(5));
        }

        return Cache::get($key);
    }
}
