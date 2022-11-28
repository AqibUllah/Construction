<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class paymentController extends Controller
{
    public function success(Request $request)
    {
        try {
            User::where('id','=',auth()->user()->id)->update(['email_verified_at' => now()]);
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $session = $stripe->checkout->sessions->retrieve($request->get('sessionId'));
            $customer = $stripe->customers->retrieve($session->customer);
            return view('payment.success');
        }catch (\Exception $e)
        {
            throw new NotFoundHttpException();
        }

    }

    public function cancel(Request $request)
    {

        return view('payment.cancel');
    }
}
