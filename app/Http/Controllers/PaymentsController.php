<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payment;
use App\Product;
use App\User;
use App\Transaction;
use App\Order;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $payments = Payment::orderBy('created_at','desc')->paginate(20);
        $payments->load('user');
        $payments->load('product');

        $products = Product::all();
        $page = 'payments';

        return view('admin.payments',compact('user','products','payments','page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = $request->user();
        $payment = new Payment(['amount' => $request->amount,'booking_number' => $request->booking_number,'note' => $request->note, 'product_id' => $request->product_id, 'user_id' => $user->id()]);
        $payment->load('product');
        $product = $payment->product;
        $product->set_register($product->register() - $request->amount);
        $user->set_betrag($user->betrag() - $request->amount);
        $product->save();
        $user->save();
        $payment->save();
        return back();
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

    /**
     * Search for requests with booking number
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if(Payment::where('booking_number' , '=', $request->booking_number)->exists()) 
        {
            $payments = Payment::where('booking_number' , '=', $request->booking_number)->get();
            return view('admin.payments_search',compact('payments'));
        } else 
        {
            flash('No matches found! Please make sure the booking number you entered is valid.' , 'info');
            return back();
        }
    }
}