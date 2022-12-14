<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Exception;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // all products
        $products = $this->products($stripe);

        // all prices
        $prices = $this->prices($stripe);

        // all sessions
        $checkoutSessions = $this->checkoutSessions($stripe);
//        return dd($prices);

        return view('admin.stripe.billings',compact('products','prices','checkoutSessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        switch ($request->name)
        {
            case 'product' :  return view('admin.stripe.createProduct');
            break;
            case 'price' :
                $products = $this->products($stripe);
                return view('admin.stripe.createPrice',compact('products'));
            break;
            case 'session' :
                $prices = $this->prices($stripe);
//                return dd($prices);
                return view('admin.stripe.createCheckoutSession',compact('prices'));

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request['from'])
        {
            case 'product' : return $this->createProduct($request->all());
            break;
            case 'price' : return $this->createPrice($request->all());
            break;
            case 'session' : return $this->createSession($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $products = $this->products($stripe);

        switch ($request->name)
        {
            case 'product' :
                $product = $this->getProduct($id);
                return view('admin.stripe.editProduct',compact('product'));
                break;
            case 'price' :
                $price = $this->getPrice($id);
//                return dd($price);
                return view('admin.stripe.editPrice',compact('products','price'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        switch ($request->from)
        {
            case 'product' :
                    try {
                        $product = $stripe->products->update($id,[
                            'name' => $request['name'],
                            'description' => $request['description']
                        ]);
                        return redirect()->route('stripe.index')->with('updated','product has been updated on stripe');
                    }catch (\Exception $e)
                    {
                        return redirect()->route('stripe.index')->with('error', $e->getMessage());
                    }
                break;
            case 'price' :
                try {
                    $stripe->prices->update($id,[
//                        'currency_options' => [
//                            'currency' => $request['currency'],
//                            'unit_amount' =>  (double)$request['amount'],
//                        ],
                        'recurring' => ['interval' => $request['package']],
//                        'product' => $request['product_id'],
                    ]);

                    return redirect()->route('stripe.index')->with('updated','Price Updated for Product '.$request['product_id'].' on stripe');
                }catch (\Exception $e)
                {
                    return redirect()->route('stripe.index')->with('error', $e->getMessage());
                }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        switch ($request->from)
        {
            case 'product' :
                try {
                    $stripe->products->delete($id);
                    return redirect()->route('stripe.index')->with('deleted','product has been deleted on stripe');
                }catch (\Exception $e)
                {
                    return redirect()->route('stripe.index')->with('error', $e->getMessage());
                }
                break;
            case 'price' :
                try {
                    $stripe->prices->delete($id);
                    return redirect()->route('stripe.index')->with('deleted','price has been deleted on stripe');
                }catch (\Exception $e)
                {
                    return redirect()->route('stripe.index')->with('error', $e->getMessage());
                }

        }
    }

    private function createProduct(array $all)
    {
//        $formatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
//        $amount = $all['currency'] == 'usd' ? ($all['amount'] * 222.45) : $all['amount'];
        $amount = $all['amount'];
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // product create
        try {
            $product = $stripe->products->create([
                'name' => $all['name'],
                'description' => $all['description'],
                'default_price_data' => [
                    'currency' => $all['currency'],
                    'unit_amount' => (int) $amount.'00',
                    'recurring' => ['interval' => $all['package']]
                ],

            ]);

            return redirect()->route('stripe.index')->with('created','product has been created on stripe');
        }catch (\Exception $e)
        {
            return $e->getMessage();
        }

    }

    private function products($stripe)
    {
        try {
            return $stripe->products->all(['limit' => 5]);
        }catch(\Exception $e)
        {
            return [];
        }
    }
    private function prices($stripe)
    {
        try {
            return $stripe->prices->all(['limit' => 10]);
        }catch(\Exception $e)
        {
            return [];
        }
    }

    private function checkoutSessions($stripe)
    {
        try {
            return $stripe->checkout->sessions->all(['limit' => 10]);
        }catch(\Exception $e)
        {
            return [];
        }
    }

    private function createPrice(array $all)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // price create
        try {
            $price = $stripe->prices->create([
                'unit_amount' =>  (double)$all['amount'],
                'currency' => $all['currency'],
                'recurring' => ['interval' => $all['package']],
                'product' => $all['product_id'],
            ]);

            return redirect()->back()->with('created','Price Created for Product '.$all['product_id']);
        }catch (\Exception $e)
        {
            return $e->getMessage();
        }


    }

    public function getProduct($id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        return $stripe->products->retrieve($id);
    }

    private function getPrice($id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        return $stripe->prices->retrieve($id);
    }

    // checkout session create
    private function createSession(array $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        try {
            $stripe->checkout->sessions->create([
                'success_url' =>  $request['success_url'],
                'cancel_url' => $request['cancel_url'],
                'mode' => $request['mode'],
                'line_items' => [
                    [
                        'price' => $request['price'],
                        'quantity' => 1
                    ]
                ]
            ]);

            return redirect()->route('stripe.index')->with('created','checkout session Created on stripe');
        }catch (\Exception $e)
        {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
