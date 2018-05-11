<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Consumer;

class ConstructMailingList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:users_with_negative_credit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Emails users with negative credit';


    public $mailing_list;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->mailing_list = Consumer::all();
        dd($this->mailing_list);
        die("Handling myself");
    }
}
