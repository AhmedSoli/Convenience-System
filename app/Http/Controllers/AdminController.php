<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Consumer;
use App\Order;
use App\User;
use App\Product;
use App\Payment;
use App\Transaction;
use App\Console\Commands\QuarterlyCheckup;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $user = $request->user();
        $consumers_transactions = Transaction::orderBy('created_at','desc')->Paginate(15, ['*'], 'transactions');
        $consumers_transactions->load('consumer');
        $consumers_transactions->load('user');
        $consumers_list = Consumer::all();
        $consumers = Consumer::orderBy('name','asc')->Paginate(15, ['*'], 'consumers');
        $users = User::all();
        $payments= Payment::orderBy('created_at','desc')->Paginate(15, ['*'], 'payments');
        $payments->load('user');
        $page = 'home';
        return view('admin.home',compact('consumers','users','consumers_transactions','user','payments','consumers_list','page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,User $user)
    {
        $user->update($request->all());
        return back();
    }

    /**
     * Load registration forms.
     *
     * @return \Illuminate\Http\Response
     */

    public function register()
    {
        $consumers = Consumer::orderBy('name','asc')->get();
        return view ('admin.register',compact('consumers'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        $user->delete();
        return back();
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if (!User::where('email' , '=' ,$request->email)->exists()) {
            $user = new User(['email' => $request->email, 'name' => $request->name, 'password' => bcrypt($request->password)]);
            $user->save();
            flash('New Admin created successfully','success');
            return back();
        } else {
            flash('Email already exists!','danger');
            return back();
        }
    }

    /**
     * Transfer money between admins
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function transfer(Request $request)
    {
        if(User::where('id' , '=' ,$request->sender_id)->exists()) {
            if(User::where('id' , '=' ,$request->reciever_id)->exists()){
                $reciever = User::where('id' , '=' ,$request->reciever_id)->first();
                $sender = User::where('id' , '=' ,$request->sender_id)->first();
                $reciever->betrag = $reciever->betrag + $request->betrag;
                $sender->betrag = $sender->betrag - $request->betrag;
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

}
