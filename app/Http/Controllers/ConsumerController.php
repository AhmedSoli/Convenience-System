<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use App\Consumer;
use App\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\Auth;



class ConsumerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        // limiting access to admins 
        $this->middleware('auth');
    }

    /**
     * Store a newly created consumer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        if (!Consumer::where('key_id','=',$request->key_id)->exists()) {
            $consumer = new Consumer(["key_id" => $request->key_id,"name" => $request->name, "password" => bcrypt($request->password),"email" => $request->email]);
            $consumer->save();
            flash('New Consumer created successfully','success');
            return back();
        } else {
            flash('Key FOB already exists!','danger');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Consumer $consumer
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request,Consumer $consumer)
    {
        if ($request->pfand == "true") {
            // set consumer's pfand payment to true
            $consumer->set_pfand(true);
        } elseif($request->pfand == "false") {
            // set consumer's pfand payment to false
            $consumer->set_pfand(false);
        }
        //update all info and save
        $consumer->update($request->all());
        // return back
        return back();
    }

    /**
     * Deactivate consumer's account.
     *
     * @param  Consumer $consumer
     * @return \Illuminate\Http\Response
     */

    public function deactivate(Consumer $consumer)
    {
        // checking if consumer still has credit
        if($consumer->betrag != 0) 
        {
            // flashing failure message
            flash('Consumer Betrag is NOT 0! Change it to 0 and try again!','danger');
            return back();
        } else {
            // deactivating consumer's account
            $consumer->set_active(false);
            // saving changes
            $consumer->save();
            // flashing success message
            flash('Account deactivated!','success');
            return back();
        }
    }

     /**
     * Activate consumer's account.
     *
     * @param  Consumer $consumer
     * @return \Illuminate\Http\Response
     */

     public function activate(Consumer $consumer)
     {
        // activating user's account
        $consumer->set_active(true);
        // saving changes
        $consumer->save();
        return back();
    }


    /**
     * Search database for consumer using name
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($consumer = Consumer::select('id')->where('name' , '=', $request->search)->first()) {
            $url = '/consumers/' . $consumer->id;
            return redirect(url($url));
        } 
        if($consumer = Consumer::select('id')->where('key_id' , '=', $request->search)->first()) {
            $url = '/consumers/' . $consumer->id;
            return redirect(url($url));
        } 

        flash('Consumer not found!','info');
        return back();
    }

    /**
     * View single consumer page
     *
     * @param  Consumer $consumer
     * @return \Illuminate\Http\Response
     */

    public function view(Consumer $consumer){

        $orders = $consumer->getOrders();
        $consumers_transactions = $consumer->getTransactions();
        $consumers_transactions->load('user');
        $orders->load('product');
        $page = 'consumer';
        return view('admin.consumer',compact('consumer','orders','consumers_transactions','page'));

    }

}
