<?php
require_once 'layout/header.php';

$result = $membre->getMembreByEmail("zie.nanien@gmail.com");
if ($data = $result->fetch()) {
    $_SESSION['membreaeek'] = $data;
    echo $data['email'];
}
?>


<?php
require_once 'layout/footer.php';
?>
