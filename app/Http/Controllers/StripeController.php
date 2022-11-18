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

        return view('admin.stripe.billings',compact('products','prices'));
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function createProduct(array $all)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // product create
        try {
            $product = $stripe->products->create([
                'name' => $all['name'],
                'description' => $all['description']
            ]);
            return redirect()->back()->with('created','product has been created on stripe');
        }catch (\Exception $e)
        {
            return $e->getMessage();
        }

    }

    private function products($stripe)
    {
        return $stripe->products->all(['limit' => 5]);
    }
    private function prices($stripe)
    {
        return $stripe->prices->all(['limit' => 5]);
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
}
