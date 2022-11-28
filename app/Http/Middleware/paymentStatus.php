<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class paymentStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->email_verified_at !== null)
        {
            return $next($request);
        }
        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $session = $stripe->checkout->sessions->create([
                'success_url' =>  'http://localhost:8000/payment/success?sessionId={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://localhost:8000/payment/cancel',
                'mode' => 'subscription',
                'line_items' => [
                    [
                        'price' => 'price_1M6xlJCdDYiPm1gGp1wygGoi',
                        'quantity' => 1
                    ]
                ]
            ]);
            return redirect($session->url);
        }catch (\Exception $e)
        {
            return $e->getMessage();
        }

    }
}
