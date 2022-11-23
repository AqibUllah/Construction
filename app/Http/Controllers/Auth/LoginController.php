<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectToAdmin = RouteServiceProvider::ADMIN_HOME;
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // checkout session create
    public function createSessionForSubscription($user)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        try {
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
            return $this->redirectTo = $session->url;
        }catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
