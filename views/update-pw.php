<?php

if(isset($_SESSION['membreaeek'])){
    header('location:'.$domaine);
    exit();
}
if(!isset($_GET['token'])){
    header('location:'.$domaine.'/error');
    exit();
}

$descryToken = my_decrypt(str_replace('-','+',$_GET['token']));
if(!filter_var($descryToken, FILTER_VALIDATE_EMAIL)) {
    header('location:'.$domaine.'/error');
    exit();
}
unset($_SESSION['_updPwd']);
$verifEmail = $membre->getMembreByEmail($descryToken);


require_once 'controller/password.update.php';

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
                    <?php
                    if($dat = $verifEmail->fetch()) {
                    ?>
                    <h3 class="text-center">Modifier votre mot de passe</h3>
                        <form method="post" class="text-center pt-5" id="formUpdPwd">
                            <?php if (!empty($success)) { ?>
                                <div class="alert alert-success" style="font-size: 14px" role="alert">
                                    <?php foreach ($success as $succ) { ?>
                                        <?php echo $succ ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php
                            if(!empty($errors)) { ?>
                                <div class="alert alert-danger p-2" style="font-size: 14px" role="alert">
                                    <?php foreach( $errors as $error){  ?>
                                        <?=$error?>
                                    <?php }?>
                                </div>
                            <?php } ?>

                            <div class="row">
                                <div class="col-md-12 pt-4 text-left">
                                    <label for="password" class="pb-1">Nouveau mot de passe <i class="required"></i></label>
                                    <input type="hidden" class="form-control" name="formkey" value="<?= $token ?>">
                                    <input type="hidden" class="form-control" value="<?= $dat['email'] ?>" id="user" name="user">
                                    <input type="password" class="form-control input-register" id="password" name="password" placeholder="Nouveau mot de passe" required>
                                </div>
                                <div class="col-md-12 pt-3 pb-3 text-left">
                                    <label for="confpassword" class="pb-1">Confirmer mot de passe <i class="required"></i></label>
                                    <input type="password" class="form-control input-register" id="confpassword" name="confpassword" placeholder="Confirmer mot de passe" required>
                                </div>
                                <button class="btn-orange font-sery radius-6"> <i class="laodUpdPwd"></i> Modifier </button>
                            </div>
                        </form>
                    <?php
                    }else{
                        header('location:'.$domaine.'/error');
                        exit();
                    }
                    ?>
            </div>
        </div>
    </div>
</section>
<?php
require_once 'layout/footer.php';
?>
<script>
    $(document).ready(function(){

       $('#formUpdPwds').submit(function(){
         $('.laodUpdPwd').html('<i class="fas fa-circle-notch fa-spin"></i>');
       });
    });
</script>