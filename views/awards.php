<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}

require_once 'layout/header.php';

?>
<section class="container-fluid" style="background: #a6c2a626;">
<?php
if(isset($doc[0]) and !isset($doc[1])) {


    ?>
    <section class="container-fluid bg-award he-300" style="margin-top: 75px">
        <div class="container">
            <h1 class="prim-text">PRIM<span class="text-green">’</span>MA </h1>
            <p class="text-center prim-textSous text-white">Prix du meilleur membre de l'AEEK</p>
        </div>
    </section>


    <section class="about about-two sec-award">
        <div class="container py-5 my-5 text-center">
            <!-- <h1 class="text-danger font-weight-bold py-3" style="text-transform: uppercase; font-weight: bold">Deuxième édition</h1>
                    <h1 class="blink text-danger font-weight-bold" style="text-transform: uppercase; font-weight: bold"> Bientôt</h1>-->
            <div class="row pt-5">
                <div class="col-md-3 col3-award">
                    <div class="grid-item">
                        <div class="card_with_image">
                            <div class="blog_card_image">
                                <a href="<?=$domaine?>/awards/">
                                    <img src="<?=$domaine?>/uploads/634a7a7079bc0.jpg" alt="" class="img-responsive box-cover">
                                </a>
                            </div>
                            <div class="box-data">
                                <div class="">
                                    <p class="mb-0 py-2">Ouattara Gnelezie Arouna</p>
                                </div>

                                <a href="<?=$domaine?>/awards/" class="h6-award box-title ">
                                    <p class="mb-0" style="line-height: 17px;">Responsable à la communication</p>
                                </a>
                                <div class="box-action-content">
                                    <span class="box-action-star" id="reload">
                                       <input type="hidden" id="voix" name="voix" value="20"/>
                                        <span class="voi">25%</span>
                                    </span>
                                    <div class="changeEt"><a href="#" class="btn-transparence-orange vter">Cliquer pour voter</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php  }
else{
    ?>
    <section class="about about-two sec-award">
        <div class="container py-5 my-5 ">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-div" style=" background: #037f03;">
                        <h2 class="pl-2">Remplir le formulaire</h2>
                    </div>
                    <div class="body-div">
                        <form method="post" class="pl-3 formVoter" >
                            <div class="form-group">
                                <label for="nom">Nom et prénom </label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom et prénom" required/>
                            </div>
                            <div class="form-group pt-2">
                                <label for="phone">Numéro</label>
                                <input type="tel" class="form-control input-registers" id="phone" name="phone" required>
                                <input type="hidden"  name="isoPhone" id="isoPhone" value="">
                                <input type="hidden"  name="dialPhone" id="dialPhone" value="">
                            </div>
                            <div class="form-group">
                                <button class="voterBtn">Voter maintenant</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-div" style=" background: #ff4500;">
                        <h2>Informations</h2>
                    </div>
                    <div class="body-div">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Ouattara Gnelezie Arouna</h3>
                                <h3>Total votant : 500</h3>
                                <h3>Voix obtenu : 250</h3>

                            </div>
                            <div class="col-md-6">
                                <img src="<?=$domaine?>/uploads/634a7a7079bc0.jpg" alt="" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
<?php
}
?>
<?php
require_once 'layout/footer.php';
?>

<script>
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
</script>