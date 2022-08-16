<?php



require_once 'controller/membre.inscription.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 bgbleu">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="ts-box wow bounceInUp center">
                    <h3 class="text-center">Inscription</h3>
                    <div class="tab-content" id="nav-tabContent">
                            <form method="post" class="text-center pt-5" id="formInscription">
                                <?php
                                if(!empty($errors)) { ?>
                                <div class="alert alert-danger p-2" style="font-size: 14px" role="alert">
                                    <?php foreach( $errors as $error){  ?>
                                       <?=$error?>
                                    <?php }?>
                                </div>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="nom" placeholder="Nom" class="input-register">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="prenom" placeholder="Prénom" class="input-register" required>
                                        <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                                    </div>
                                    <div class="col-md-12 pt-4">
                                        <input type="email" name="email" placeholder="Email" class="input-register" required>
                                    </div>
                                    <div class="col-md-12 pt-4">
                                        <input type="password" name="password" placeholder="Mot de passe" class="input-register" required>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-4">
                                    <input type="password" name="passwordC" placeholder="Confirmer mot de passe" class=" input-register mt-0" required>
                                </div>
                                <div class="col-md-12 pt-3 pb-3 text-left">
                                    <input type="checkbox" class="custom-control-input " id="register-check" required="">
                                    <label class="custom-control-label" for="register-check">Vous acceptez les conditions d'utilisation <a href="#" class="btn-link">conditions d'utilisation</a></label>
                                </div>
                                <button class="btn-orange font-sery radius-6"> <i class="laodForm"></i> S'inscrire maintenant</button>
                                <p class="text-center pt-3">Vous avez déja un compte ? Alors<a href="<?=$domaine?>/connexion"> connectez-vous</a></p>
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

       $('#formInscription').submit(function(){
//                  alert('ok');
         $('.laodForm').html('<i class="fa fa-circle-notch fa-spin"></i>');
       });
    });
</script>