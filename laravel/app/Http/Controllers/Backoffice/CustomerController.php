<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::with('user')->withTrashed()->get();

        // $categoriesTrashed = Category::onlyTrashed()->get();

        return view('backoffice.customers.customer_show', compact('customers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get()->all();

        return view('backoffice.customers.customer_create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'street' => 'required',
            'nr' => 'required',
            'postal_code' => 'required',
            'province' => 'required',
            'user_id' => 'required',
        ]);
    
        $customer = Customer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'street' => $request->input('street'),
            'nr' => $request->input('nr'),
            'postal_code' => $request->input('postal_code'),
            'province' => $request->input('province'),
            'user_id' => $request->input('user_id'),
        ]);
    
        return redirect()->route('customers.index')->with('success', "The customer <strong>$customer->first_name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $customer = Customer::findOrFail($id);
            $params = [
                'customer' => $customer,
            ];
            return view('backoffice.customers.customer_delete')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $customer = Customer::findOrFail($id);
            $users = User::get()->all();
            $params = [
                'customer' => $customer,
            ];
            return view('backoffice.customers.customer_edit', compact('users'))->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
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
        try
        {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'street' => 'required',
                'nr' => 'required',
                'postal_code' => 'required',
                'province' => 'required',
                'user_id' => 'required',
            ]);

            $customer = Customer::findOrFail($id);
            $customer->first_name = $request->input('first_name');
            $customer->last_name = $request->input('last_name');
            $customer->street = $request->input('street');
            $customer->nr = $request->input('nr');
            $customer->postal_code = $request->input('postal_code');
            $customer->province = $request->input('province');
            $customer->user_id = $request->input('user_id');
            $customer->save();

            return redirect()->route('customers.index')->with('success', "The Customer <strong>$customer->first_name $customer->last_name</strong> has successfully been updated.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
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
        try
        {
            $customer = Customer::findOrFail($id);
            $customer->forceDelete();
            return redirect()->route('customers.index')->with('success', "The Customer <strong>$customer->first_name + $customer->last_name</strong> has successfully been deleted.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

        /**
     * Soft Delete a specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        try
        {
            $customer = Customer::findOrFail($id);
            $customer->delete();
            return redirect()->route('customers.index')->with('success', "The customer with email: <strong>$customer->email</strong> has successfully been deactivated.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

        /**
     * Restore a soft deleted item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softUndelete($id)
    {
        try {
            $customer = Customer::withTrashed()->findOrFail($id);
            $customer->restore();
            return redirect()->route('customers.index')->with('success', "The customer with the email: <strong>$customer->email</strong> has successfully been reactivated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }
}
