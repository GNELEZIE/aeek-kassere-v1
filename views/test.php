<?php
$dateGmt = gmdate('Y-m-d H:i');
$date1 = str_replace('-', '/', $dateGmt);
$tomorrow = date('m-d-Y',strtotime($date1 . "+26 days"));

echo $tomorrow;