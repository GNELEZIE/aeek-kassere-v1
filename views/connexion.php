<?php
$myIp =  Detect::ip();
$result = json_decode(getDataByUrl('http://ip-api.com/json/'.$myIp),true);
if($result['status'] == 'success'){
    $countryCode = $result['countryCode'];
    $city = $result['city'];
}else{
    $city = '';
    $countryCode = '';
}



require_once 'controller/membre.connexion.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 bgbleu">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-4">
                <div class="ts-box  wow bounceInUp center">
                    <h3 class="text-center">Connexion</h3>
                    <form method="post" class="text-center" id="formLogin">
                        <?php
                        if(!empty($errors)) { ?>
                            <div class="alert alert-danger p-2" style="font-size: 14px" role="alert">
                                <?php foreach( $errors as $error){  ?>
                                    <?=$error?>
                                <?php }?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12 pt-4">
                                <input type="tel" class="form-control input-style" id="phone" name="phone" required>
                                <input type="hidden"  name="isoPhone" id="isoPhone" value="">
                                <input type="hidden"  name="dialPhone" id="dialPhone" value="">
                                <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                            </div>
                            <div class="col-md-12 pt-4">
                                <input type="password" name="password" placeholder="Mot de passe" class="input-register" required>
                            </div>
                        </div>

                        <div class="col-md-12 pt-3 pb-3 text-left">
                            <div class="custom-control custom-checkbox">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="custom-control custom-checkbox m-0 p-0">
                                            <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                            <label class="custom-control-label" for="remember">Se souvenir de moi</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="<?=$domaine?>/forgot" class=""> <small> Mot de passe oublié</small></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn-orange font-sery radius-6"> <i class="laodLogin"></i> Connexion </button>
                        <p class="text-center pt-3">Vous n'avez pas de compte? <a href="<?=$domaine?>/inscription"> Inscrivez-vous</a></p>
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

       $('#formLogin').submit(function(){
         $('.laodLogin').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
       });
    });
</script>
<script>

    $("#phone").keyup(function (event) {
        if (/\D/g.test(this.value)) {
            //Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });

    var inputPhone = document.querySelector("#phone");
    window.intlTelInput(inputPhone, {
        initialCountry: '<?=$countryCode?>',
        utilsScript: "<?=$asset?>/plugins/intltelinput/js/utils.js"
    });
    var iti = window.intlTelInputGlobals.getInstance(inputPhone);
    var countryData = iti.getSelectedCountryData();
    $('#isoPhone').val(countryData["iso2"]);
    $('#dialPhone').val(countryData["dialCode"]);
    inputPhone.addEventListener("countrychange", function() {
        var iti = window.intlTelInputGlobals.getInstance(inputPhone);
        var countryData = iti.getSelectedCountryData();
        $('#isoPhone').val(countryData["iso2"]);
        $('#dialPhone').val(countryData["dialCode"]);
    });

    $('#formCarte').submit(function(e){
        $('.loaded').html('Envoie en cours...');
    });



</script>