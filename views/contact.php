<?php

require_once 'layout/header.php';
?>
<section class="banner banner-blog banner-five">
    <div class="banner-overlay"></div>

    <div class="p-3 text-center position-text"><h2><span class="bg-orange px-3 mb-3 text-white"> Contactez-nous</span></h2>
    </div>
</section>
<section class="page-header">
    <div class="container">
        <div class="content">
            <h4>Pongala info</h4>
            <ul>
                <li><span><i class="fa fa-home" aria-hidden="true"></i></span> <a href="<?=$domaine?>">Acceuil</a>
                    <span>|</span></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>
<section class="contact padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="contact-form">
                    <h3>Envoyer un message</h3>
                    <form method="post" class="text-center">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <input type="text" name="name" placeholder="Nom & Prénom" class="contact-input input-styles">
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <input type="email" name="email" placeholder="Email" class="contact-input input-styles">
                            </div>
                        </div>
                        <input type="text" name="subject" placeholder="Sujet" class="contact-input input-styles">
                        <textarea rows="5" class="contact-input input-styles">Massage</textarea>
                        <button class="btn-transparence-orange">Envoyer maintenant</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="contact-info">
                    <h3>Nos contacts</h3>
                    <ul class="info">
                        <li>
                            <div class="icon flaticon-signs-1"></div>
                            <div class="content">
                                <p>Departement de Boundiali </p>
                                <p>Kasséré chel lieu du Pongala</p>
                            </div>
                        </li>

                        <li>
                            <div class="icon flaticon-phone-call"></div>
                            <div class="content">
                                <p>88013 659 214 512, 66021489</p>
                                <p>01923 255 100 326</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon flaticon-message"></div>
                            <div class="content">
                                <p>Support@yourmail.com</p>
                                <p>http://admin@.com</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="event-social">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <!-- contact-info -->
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>

















<?php
require_once 'layout/footer.php';
?>
