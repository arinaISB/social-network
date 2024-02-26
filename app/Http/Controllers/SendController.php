<?php

namespace App\Http\Controllers;

use App\Jobs\SendTextJob;
use Illuminate\Http\Request;

class SendController extends Controller
{
    public function sendText()
    {
        SendTextJob::dispatch()->onQueue('text');
    }
}
