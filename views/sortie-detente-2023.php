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

require_once 'controller/sortie-save.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 banner-sortie">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="ts-box wow bounceInUp center">
                    <h1 class="text-center font-22 text-dark" style="font-weight: bold;line-height: 1.5;">Inscription pour la sortie détente AEEK 2023</h1>
                    <h3 class="text-center font-17 py-2">Places disponibles : <span class=""><b class="text-danger count_sortie"></b></span></h3>
                    <h3 class="text-center font-17 py-2">Infoline : 07 07 61 45 61</h3>
                        <form method="post" class="pt-3" id="SortieInscription" style="text-align: left;">
                            <?php
                            if(!empty($errors)) { ?>
                                <div class="alert alert-danger mb-2 mt-2 p-2" style="font-size: 13px" role="alert">
                                    <?php foreach( $errors as $error){  ?>
                                        <?=$error?>
                                    <?php }?>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nom">Nom et prénom</label>
                                    <input type="text" name="nom" id="nom" placeholder="Nom" class="input-register">
                                </div>
                                <div class="col-md-12 pt-3">
                                    <label for="aeek">Est vous membre de l'AEEK ?</label>
                                    <select name="aeek" id="aeek" class="input-register select-type" required>
                                        <option value="" selected>Choisir une option</option>
                                        <option value="Oui">Oui</option>
                                        <option value="Non">Non</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <p class="frais m-0 pt-2"></p>
                                </div>
                                <div class="col-md-12 pt-3">
                                    <input type="tel" class="form-control input-registers" id="phone" name="phone" required>
                                    <input type="hidden"  name="isoPhone" id="isoPhone" value="">
                                    <input type="hidden"  name="dialPhone" id="dialPhone" value="">
                                </div>
                                <div class="col-md-12 text-center ">
                                    <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                                    <button class="btn-orange font-sery radius-6 mt-3"> <i class="laodForm"></i> S'inscrire maintenant</button>
                                </div>
                            </div>


                        </form>


                </div>
            </div>
        </div>
</section>
<?php
require_once 'layout/footer.php';
?>
<script>
    $(document).ready(function(){
        chargeSortie();
        function chargeSortie(){
            $.ajax({
                type: 'post',
                url: '<?=$domaine?>/controle/count.sortie',
                dataType: 'json',
                success: function(data){
                    $('.count_sortie').html(data.count_sortie);
                }
            });
        }

        $('#SortieInscription').submit(function(e){
            $('.laodForm').html('<i class="fa fa-circle-notch fa-spin"></i>')
        });


/*        $('#SortieInscription').submit(function(e){
            e.preventDefault();
            var value = document.getElementById('SortieInscription');
            var form = new FormData(value);

            $.ajax({
                method: 'post',
                url: '<?=$domaine?>/controle/sortie-save',
                data: form,
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                    if(data == 'ok'){
                        $('#nom').val('');
                        $('#aeek').val('');
                        $('#phone').val('');
                        chargeSortie();
                        swal("Inscription effectuée  avec succès !","", "success");
                    }else if(data == '1'){

                        swal("Impossible de s'inscrire !", "Ce numéro a été déjà inscrit !", "warning");
                    }
                    else{
                        swal("Action Impossible !", "Une erreur s\'est produite.", "error");
                        $(".loaderBtnPay").html('');
                    }
                },
                error: function (error, ajaxOptions, thrownError) {
                    alert(error.responseText);
                }
            });

        })*/;


        $("select.select-type").change(function() {
            var types = $(this).children("option:selected").val();

            if (types == 'Non') {
                $('.frais').html('<span class="text-green">Frais de participation : <b>1500 FCFA</b></span>');
            }else{
                $('.frais').html('');
            }
        });

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