<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SubscribeController extends Controller
{
    public function subscribe(Request $request){
        $user = auth()->user();

        $payLink = $user->newSubscription('default', $month = 42335)
            ->returnTo(route('dash'))
            ->create();

        $payLinkSix = $user->newSubscription('default', $six = 42336)
            ->returnTo(route('dash'))
            ->create(); 
            
        $subscription = $user->subscription('default');
 
        $lastPayment = $subscription->lastPayment();
        $nextPayment = $subscription->nextPayment();

        $receipts = $user->receipts;
            
        return view('subscribe', compact('payLink','payLinkSix', 'lastPayment', 'nextPayment', 'receipts'));    
    }
}
