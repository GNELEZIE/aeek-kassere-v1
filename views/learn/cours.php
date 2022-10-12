<?php
$lisPropos = $propos->getAllpropos();
require_once 'layout/header.php';
?>

<section class="container-fluid head-pag" style="margin-top: 75px">
    <div class="container text-center" style="padding-top: 29px;">
        <h1>A propos</h1>
    </div>
</section>
<section class="venue-section padding-120">
    <div class="container">
        <div class="section-header text-center">
            <h3>Enjoy Your Stay</h3>
            <p><em>Quickly harness dynamic thinking through value added models.</em></p>
        </div>

        <div class="section-wrapper">
            <div class="venue-list">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="venue-item">
                            <div class="venue-thumb">
                                <img src="<?=$asset?>/images/venue/01.jpg" alt="venue">
                            </div>
                            <div class="venue-content">
                                <h4>Sheration Hotel</h4>
                                <p><span>Room Rate: </span>$150/per day</p>
                                <p><span>Distance from Venue: </span>0.50 KM</p>
                            </div>
                        </div>
                    </div>










                </div>
            </div>
        </div>
    </div>
</section>



<?php
require_once 'layout/footer.php';
?>


