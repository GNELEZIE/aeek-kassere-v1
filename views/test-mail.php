<?php
$email ="zie.nanien@gmail.com";
$subject ="Tester";
$message ="Tester Tester TesterTester";
$test = sendMailNoReply($email, $subject, $message);

echo $test;