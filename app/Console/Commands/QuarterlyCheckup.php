<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Consumer;
use Mail;
class QuarterlyCheckup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:credit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks user Credit and send reminder emails.';

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
        $consumers = Consumer::where('betrag','<','0')->take(2);

        foreach($consumers as $consumer) {
            $consumer->betrag = $consumer->betrag - ($consumer->betrag * 0.1);
            $consumer->save();
        }

        foreach($consumers as $consumer) {
            Mail::send('mail.quarter', ['consumer' => $consumer], function ($mail) use ($consumer) {
            $mail->from('hello@app.com', 'ISEA RWTH');
            $mail->to($consumer->email, $consumer->name)->subject('Payment Reminder!');
        });
        }
    }
}
