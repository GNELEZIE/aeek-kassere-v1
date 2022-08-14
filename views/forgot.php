<?php



require_once 'controller/password.forgot.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 bgimg1">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-4">
                <div class="ts-box">
                    <div class="tab-content" id="nav-tabContent">
                            <form method="post" class="text-center" id="forgotForm">
                                <div class="text-center">
                                    <h4 class="p-3 font-28" style="margin: 0;">Réinitialisation du mot de passe</h4>
                                    <p>Vous avez oublié votre mot de passe ? Entrez votre adresse e-mail ci-dessous et nous vous enverrons un e-mail pour réinitialisé votre mot de passe.</p>
                                </div>
                                <?php
                                if(!empty($errors)) { ?>
                                <div class="alert alert-danger p-2" style="font-size: 14px" role="alert">
                                    <?php foreach( $errors as $error){  ?>
                                       <?=$error?>
                                    <?php }?>
                                </div>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-md-12 pb-3 text-left">
                                        <label for="email" class="pb-1">Email <i class="required"></i></label>
                                        <input type="email" name="email" placeholder="Email" class="input-register" required>
                                        <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                                    </div>

                                </div>
                                <button class="btn-orange font-sery radius-6"> <i class="laodForgot"></i> Réinitialisation du mot de passe </button>
                            </form>
                        </div>

            </div>
        </div>
    </div>
</section>
<?php
require_once 'layout/footer.php';
?>
<script>
    $(document).ready(function(){

       $('#forgotForm').submit(function(){
//                  alert('ok');
         $('.laodForgot').html('<i class="fas fa-circle-notch fa-spin"></i>');
       });
    });
</script>