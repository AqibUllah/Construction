<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Stripe\Stripe;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if(auth()->user()->hasRole('client'))
        {
            return view('client.ClientDashboard');
        }
        $clients = user::whereHas('Roles',function($q){
            $q->where('name','client');
        })->get();
        return view('admin.clients',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Clients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'email' => [
                'required','nullable','string','email','max:255',
                Rule::unique('users'),
            ],
            'password' => 'nullable|string|min:6|confirmed',
        ));

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
        ]);
       if($user)
       {
           $user->assignRole('client');
           return redirect()->route('clients.index')->with('created','Client has been created successfully');
       }
        return redirect()->back()->with('error',`Oops! Can'nt done smoething  went wrong`);
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
        $client = User::find($id);
        return view('admin.Clients',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $client)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'email' => [
                'required','nullable','string','email','max:255'
            ],
            'password' => 'nullable|string|min:6|confirmed',
        ));

        try {
            $client->name = $request->name;
            $client->email = $request->email;
            $client->phone = $request->phone;
            $client->address = $request->address;
            if ($request->password != null) {
                return $this->validate($request, array(
                    'name' => 'required|string|max:255',
                    'email' => [
                        'required', 'nullable', 'string', 'email', 'max:255',
                        Rule::unique('users')->ignore($client->id),
                    ],
                    'password' => 'required|string|min:6|confirmed',
                ));
                $client->password = bcrypt($request->password);
            }
            $client->save();
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('clients.index')->with('updated', $client->name . ' has updated successfully');
            }
            return redirect()->route('client.settings')->with('updated', $client->name . ' has updated successfully');
        }catch (\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientDelete = User::destroy($id);
        if($clientDelete)
        {
            return redirect()->route('clients.index')->with('deleted','Client has been deleted successfully');
        }
        return redirect()->back()->with('error',`Oops! Can'nt deleted smoething  went wrong`);
    }

    public function getService($service)
    {
        $service = Service::find($service);
//        $stripe = new \stripe\StripeClient(env('STRIPE_SECRET'));
//        // product create
//        $product = $stripe->products->create([
//            'name' => 'purchase service',
//            'default_price_data' => [
//                'unit_amount' => (int)$service->price,
//                'currency' => 'pkr'
//            ],
//            'description' => $service->price.'/Day',
//        ]);
//        // price create
//        $price = $stripe->prices->create([
//            'unit_amount' =>  (int)$service->price,
//            'currency' => 'pkr',
//            'recurring' => ['interval' => 'day'],
//            'product' => $product['id'],
//        ]);

        return view('client.buy',compact('service'));
    }
}
