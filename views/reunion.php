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

require_once 'controller/reunion.inscription.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 bgr1">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <div class="ts-box wow bounceInUp center">
                    <h3 class="text-center font-15">Inscription pour la réunion</h3>
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
                                    <div class="col-md-12">
                                        <input type="text" name="nom" placeholder="Nom" class="input-register">
                                    </div>
                                    <div class="col-md-12 pt-3">
                                        <input type="text" name="prenom" placeholder="Prénom" class="input-register" required>
                                        <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                                    </div>
                                    <div class="col-md-12 pt-3">
                                        <input type="email" name="email" placeholder="Email" class="input-register" required>
                                    </div>
                                    <div class="col-md-12 pt-3">
                                        <input type="tel" class="form-control input-registers" id="phone" name="phone" required>
                                        <input type="hidden"  name="isoPhone" id="isoPhone" value="">
                                        <input type="hidden"  name="dialPhone" id="dialPhone" value="">
                                    </div>
                                    <div class="col-md-12 pt-3">
                                        <input type="tel" class="form-control input-register" id="ville" name="ville" value="<?=$city?>" required>
                                    </div>
                                </div>
                                <button class="btn-orange font-sery radius-6 mt-3"> <i class="laodForm"></i> S'inscrire maintenant</button>
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
       $('#formInscription').submit(function(){
//                  alert('ok');
         $('.laodForm').html('<i class="fa fa-circle-notch fa-spin"></i>');
       });
    });
</script>