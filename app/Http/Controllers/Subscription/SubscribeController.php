<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        //user do commit

        try {
            $subscription = $user->newSubscription('default', 'price_1NPxp1DZ1I1u3ORBGJKStW3k')
                ->checkout([
                    'success_url' => config('app.site_url') . '/success',
                    'cancel_url' => config('app.site_url') . '/cancel'
                ]);
        } catch (\Exception $e) {
            dd($e);
        }

        return [
            'stripe_url' => $subscription->url
        ];
    }
}
