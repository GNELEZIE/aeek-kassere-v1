<?php
$message = 'Ceci est un message !';

$test = sendMailNoReply('zie.nanien@gmail.com','Sujet',$message);
echo $test;