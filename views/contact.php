<?php
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
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
                <div class="contact-form wow slideInLeft">
                    <h3>Envoyer un message</h3>
                    <form method="post" class="text-center" id="contactForm">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <input type="text" name="nom" id="nom" placeholder="Nom & Prénom" class="contact-input input-styles" required>
                                <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <input type="email" name="email" id="email" placeholder="Email" class="contact-input input-styles" required>
                            </div>
                        </div>
                        <input type="text" name="sujet" id="sujet" placeholder="Sujet" class="contact-input input-styles" required>
                        <textarea rows="5" name="message" id="message" class="contact-input input-styles" placeholder="Massage" required></textarea>
                        <button class="btn-transparence-orange"><span class="loadContact">Envoyer maintenant</span></button>

                        <div class="success"></div>
                        <div class="Error"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="contact-info wow bounceInUp center">
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
                                <p>contact@aeek-kassere.com</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="event-social">
                        <li><a href="https://www.facebook.com/aeekkassere" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCDhp_Sepv7QJEmiTdCRAuXg" target="_blank"><i class="fa fa-youtube instagram" aria-hidden="true"></i></a></li>
<!--                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
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
<script>
    $('#contactForm').submit(function(e){
        e.preventDefault();
        $('.loadContact').html('<span class="output_message text-center font-weight-600 infos"><i class="fa fa-spinner fa-spin"></i> Envoie de votre message en cours...</span>');
        var value = document.getElementById('contactForm');
        var form = new FormData(value);

        $.ajax({
            method: 'post',
            url: '<?=$domaine?>/controller/contact.save.php',
            data: form,
            contentType:false,
            cache:false,
            processData:false,
            dataType: 'json',
            success: function(data){
                if(data.data_info == "ok"){
                    $('.loadContact').html('<span class="loadContact">Envoyer maintenant</span>');
                    $('#nom').val('');
                    $('#email').val('');
                    $('#sujet').val('');
                    $('#message').val('');
                    swal("Succès !", "Votre message a été envoyé avec succès!", "success");
                }else if(data.data_info == '1'){
                    $('.loadContact').html('');
                    $('.Error').html('<span class="text-center error">Votre adresse email n\'est pas correct</span>')
                }
                else {
                    $('.Error').html('<span class=" text-center font-weight-600 error">Une erreur s\'est produite lors de l\'envoie du message.</span>');
                }
            },
            error: function (error, ajaxOptions, thrownError) {
                alert(error.responseText);
            }
        });
    });
</script>