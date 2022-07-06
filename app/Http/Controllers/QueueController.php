<?php

namespace App\Http\Controllers;

use App\Jobs\LoggingMessage;
use Illuminate\Support\Str;

class QueueController extends Controller
{
    public function index(): void
    {
        $number = 10;

        while ($number) {
            LoggingMessage::dispatch(Str::random(20));

            $number--;
        }
    }
}
