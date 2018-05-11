<p>
Hey {{$consumer->name}},
</p>
<p>
this is a reminder that the quarterly check up takes place next week. In case you have a negative balance, make sure
to change that as soon as possible. All accounts with negative balance at Friday 00:00 will recieve a penalty of 10%. 
(-10 => -11, -20 => -22, -15 => -16.5 ...)
</p>
<p>
Your current balance is {{$consumer->betrag}}
</p>
