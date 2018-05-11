<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Order;
use App\Transaction;
use App\Product;
use App\Consumer;
use App\RegisterTransaction;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password','betrag'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function register_transactions()
    {
        return $this->hasMany(Register_Transaction::class);
    }
    
    public function getTransactions(){

        return Transaction::where('user_id','=', $this->id)->join('consumers', 'transactions.consumer_id' , '=', 'consumers.id')->select('consumers.name', 'transactions.amount', 'transactions.created_at','transactions.note')->orderBy('transactions.created_at','desc')->get();
        
    }
    public function name(){
        return $this->name;
    }

    public function email(){
        return $this->email;
    }

    public function password(){
        return $this->password;
    }

    public function id(){
        return $this->id;
    }



    public function betrag(){
        return $this->betrag;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_email($email){
        $this->email = $email;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_betrag($betrag){
        $this->betrag = $betrag;
    }

}