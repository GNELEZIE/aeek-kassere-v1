<?php
$count_sortie ='';


    $nbSort = $sortie->getNbrSortie()->fetch();
    $count_sortie .= 35 - $nbSort['nb'];



$output = array(
    'count_sortie' => $count_sortie
);
echo json_encode($output);