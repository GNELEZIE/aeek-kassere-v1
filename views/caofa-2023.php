<?php



require_once 'controller/caofa-save.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 banner-caofa">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="ts-box wow bounceInUp center">
                    <h1 class="text-center font-25 text-dark" style="font-weight: bold;line-height: 1.5;">Concours d’Art Oratoire féminin </h1>
                    <h3 class="text-center font-17 py-2">Infoline : 05 56 05 44 66 / 05 86 68 30 50</h3>
                    <form method="post" class="pt-3" id="CAOFAInscription" style="text-align: left;">
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
                                <input type="text" name="nom" id="nom" placeholder="Nom" class="input-register" required>
                            </div>
                            <div class="col-md-12 pt-3">
                                <label for="phone"> Téléphone</label>
                                <input type="tel" class="form-control input-registers" id="phone" name="phone" required>
                                <input type="hidden"  name="isoPhone" id="isoPhone" value="">
                                <input type="hidden"  name="dialPhone" id="dialPhone" value="">
                            </div>
                            <div class="col-md-12 pt-3">
                                <label for="niveau">Niveau d'étude</label>
                                <input type="text" name="niveau" id="niveau" placeholder="Niveau d'étude" class="input-register" required>
                            </div>
                            <div class="col-md-12 pt-3">
                                <label for="message">Pourquoi voulez-vous participez ?</label>
                                <textarea name="message" class="input-register" id="message" rows="2" placeholder="Message" required></textarea>
                            </div>


                            <div class="col-md-12 text-center ">
                                <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                                <button class="btn-green font-sery radius-6 mt-3"> <i class="loade"></i> S'inscrire maintenant</button>
                            </div>
                        </div>


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

        $('#CAOFAInscription').submit(function(){
            $('.loade').html('<i class="loader-btn"></i>');
        });

        $("#phone").keyup(function (event) {
            if (/\D/g.test(this.value)) {
                //Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });

        var inputPhone = document.querySelector("#phone");
        window.intlTelInput(inputPhone, {
            initialCountry: 'CI',
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


    });
</script>