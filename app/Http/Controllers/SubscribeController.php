<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SubscribeController extends Controller
{
    public function subscribe(Request $request){
        $payLink = $request->user()->newSubscription('default', $month = 42335)
        ->returnTo(route('dash'))
        ->create();

        return view('subscribe', /* compact('categories') */);
    }
}
