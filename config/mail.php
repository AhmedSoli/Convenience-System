<?php

return array(
  "driver" => "smtp",
  "host" => "mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "929f6cb9683271",
  "password" => "aec1728c5d3081",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
);
