<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\Paginator;

use App\Transaction;
use App\User;
use App\Consumer;
use App\Product;
use App\Order;
use App\RegisterTransaction;

class TransactionsController extends Controller
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
        $consumers = Consumer::all()->sortby('name');
        $user = $request->user();
        $consumers_transactions = Transaction::orderBy('created_at','desc')->Paginate(15,['*'],'consumers_transactions');
        $registers_transactions = RegisterTransaction::orderBy('created_at','desc')->Paginate(15,['*'],'registers_transactions');
        $consumers_transactions->load('consumer');
        $consumers_transactions->load('user');
        $admins = User::all();
        $registers_transactions->load('sender');
        $registers_transactions->load('reciever');
        $page = 'transfer';
        return view('admin.transfer',compact('consumers','consumers_transactions','admins',
            'registers_transactions','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if($request->positive == 'false'){
            $request->betrag = - $request->betrag;
        }
        $user = $request->user();
        $transaction = new Transaction(['amount' => $request->betrag,'booking_number' => $request->booking_number,'consumer_id' => $request->consumer_id,'note' => $request->note,'user_id' => $user->id]);
        $transaction->load('consumer');
        $consumer = $transaction->consumer;
        $consumer->set_betrag($consumer->betrag + $request->betrag);
        $user->betrag = $user->betrag + $request->betrag;
        $consumer->save();
        $transaction->save();
        $user->save();
        flash('Transaction completed!','success');
        return back();
    }

    /**
     * Transfer money from one consumer to another.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function transfer_consumers(Request $request){
        if ($request->sender_id === $request->reciever_id) 
        {
            flash('Operation not allowed!','info');
            return back();
        }
        $user = $request->user();
        $transaction_add = new Transaction(['amount' => $request->betrag,'booking_number' => $request->booking_number,'consumer_id' => $request->reciever_id,'note' => $request->note,'user_id' => $user->id]);
        $transaction_sub = new Transaction(['amount' => -$request->betrag,'booking_number' => $request->booking_number,'consumer_id' => $request->sender_id,'note' => $request->note,'user_id' => $user->id]);
        $transaction_add->load('consumer');
        $transaction_sub->load('consumer');
        $consumer_add = $transaction_add->consumer;
        $consumer_sub = $transaction_sub->consumer;
        $consumer_add->set_betrag($consumer_add->betrag + $request->betrag);
        $consumer_sub->set_betrag($consumer_sub->betrag - $request->betrag);
        $consumer_add->save();
        $consumer_sub->save();
        $transaction_add->save();
        $transaction_sub->save();
        flash('Money transferred successfully!','success');
        return back();
    }

     /**
     * Transfer money from one register to another.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function transfer_admins(Request $request){

        if ($request->sender_id === $request->reciever_id) 
        {
            flash('Operation not allowed!','info');
            return back();
        }

        if(User::where('id' , '=' ,$request->sender_id)->exists()) {
            if(User::where('id' , '=' ,$request->reciever_id)->exists()){
                $transaction= new RegisterTransaction(['amount' => $request->betrag,'booking_number' => $request->booking_number,'reciever_id' => $request->reciever_id,'note' => $request->note,'sender_id' => $request->sender_id]);
                $reciever = User::where('id' , '=' ,$request->reciever_id)->first();
                $sender = User::where('id' , '=' ,$request->sender_id)->first();
                $reciever->betrag = $reciever->betrag + $request->betrag;
                $sender->betrag = $sender->betrag - $request->betrag;
                $transaction->save();
                $sender->save();
                $reciever->save();
                flash('Transaction completed!','success');
                return back();
            }
            flash("Transfer could not get completed. Reciever ID doesnt' exist","info");
            return back();
        }
        flash("Transfer could not get completed. Sender ID doesnt' exist","info");
        return back();

    }

    /**
     * Search for requests with booking number
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        if(Transaction::where('booking_number' , '=', $request->booking_number)->exists()) 
        {
            $transactions = Transaction::where('booking_number' , '=', $request->booking_number)->get();
            $transactions->load('user');
            $transactions->load('consumer');
            return view('admin.transactions_search',compact('transactions'));
        } else 
        {
            flash('No matches found! Please make sure the booking number you entered is valid.' , 'info');
            return back();
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
}
