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
<section class="about about-two" style="background: rgba(232, 246, 255, 0.69)">
    <div class="container py-5">


    </div>
    <!-- container -->
</section>