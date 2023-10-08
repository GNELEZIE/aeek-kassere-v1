<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}

if(isset($doc[1]) and !isset($doc[2])) {

    $list = $candidat->getCandidatBySlug($doc[1]);
    $slgs = $doc[1];
    if ($dataCan = $list->fetch()) {

    } else {
        header('location:' . $domaine . '/error');
        exit();
    }

}else{
    $slgs = "";
}


$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';

?>
<section class="container-fluid" style="background: #a6c2a626;padding: 0">
<?php
if(isset($doc[0]) and !isset($doc[1])) {


    ?>
    <section class="container-fluid bg-award23 he-300" style="margin-top: 75px">
        <div class="container">
            <h1 class="prim-text">PRIM<span class="text-green">’</span>MA </h1>
            <p class="text-center prim-textSous text-white">Prix du meilleur membre de l'AEEK</p>
        </div>
    </section>


    <section class="about about-two sec-award">
        <div class="container text-center">
            <h1 class="text-danger font-weight-bold py-3" style="text-transform: uppercase; font-weight: bold">Le vote prend fin dans <span class="blink">25</span> jours</h1>
                    <h1 class="blink text-danger font-weight-bold" style="text-transform: uppercase; font-weight: bold"> </h1>
            <div class="row pt-5">
                <?php
                $list = $candidat->getAllCandidats();

                while($dataL = $list->fetch()){
                    $nbre = $voter->getNbrVote()->fetch();
                    $nbrebyCand = $voter->getNbrVoteByCandidat($dataL['id_candidat'])->fetch();
                    $pourcents = pourcentage($nbre['nb'],$nbrebyCand['nb']);

                    $pourcent = number_format($pourcents,2).'%';
                ?>

                <div class="col-md-3 col3-award">
                    <div class="grid-item">
                        <div class="card_with_image">
                            <div class="blog_card_image">
                                <a href="<?=$domaine?>/awards/">
                                    <img src="<?=$domaine?>/uploads/<?=$dataL['photo']?>" alt="" class="img-responsive box-cover">
                                </a>
                            </div>
                            <div class="box-data">
                                <div class="">
                                    <p class="mb-0 py-2"><?=html_entity_decode(stripslashes($dataL['nom'])).' '.html_entity_decode(stripslashes($dataL['prenom']))?></p>
                                </div>

                                <a href="<?=$domaine?>/awards/" class="h6-award box-title ">
                                    <p class="mb-0 mbs" style="line-height: 17px;"><?=html_entity_decode(stripslashes($dataL['fonction']))?></p>
                                </a>
                                <div class="box-action-content">
                                    <span class="box-action-star" id="reload">
                                       <input type="hidden" id="voix" name="voix" value="20"/>
                                        <span class="voi"><?=$pourcent?></span>
                                    </span>
                                    <div class="changeEt"><a href="<?=$domaine?>/awards/<?=html_entity_decode(stripslashes($dataL['slug']))?>" class="btn-transparence-orange vter">Cliquer pour voter</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>

        </div>
    </section>
<?php  }
else{
    ?>
    <section class="about about-two sec-award">
        <div class="container py-5 my-5 ">
            <div class="row">
                <div class="col-md-6" style= "padding-bottom: 30px" >
                    <div class="header-div" style=" background: #037f03;">
                        <h2 class="pl-2">Remplir le formulaire</h2>
                    </div>
                    <div class="body-div">
                        <form method="post" class="pl-3 formVoter" id="formVote">
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
                                <input type="hidden"  name="candId" id="candId" value="<?=$dataCan['id_candidat']?>">
                                <input type="hidden" name="token" value="<?=$token?>"/>
                                <button class="voterBtn"><span class="loader">Voter maintenant</span></button>
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

                                <h3 style="line-height: 1.5;color: #696969"><b><?=html_entity_decode(stripslashes($dataCan['nom'])).' '.html_entity_decode(stripslashes($dataCan['prenom']))?></b></h3>
                                <h5 class="mb-0" style="line-height: 1.3 ;color: #696969; padding-top: 10px"><?=html_entity_decode(stripslashes($dataCan['fonction']))?></h5>
                                <h5 style="    color: #696969; padding-top: 10px">Total votant : <b style="color: #ff0000"> <span class="getnbrevote"></span> </b></h5>
                                <h5 style="    color: #696969; padding-top: 10px">Voix obtenu : <b style="color: #008000"><span class="getnbrevotebycand"></span></b></h5>

                            </div>
                            <div class="col-md-6">
                                <img src="<?=$domaine?>/uploads/<?=$dataCan['photo']?>" alt="" class="">
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


    chargeVote();
    chargeVoteByCandidat();

    function chargeVoteByCandidat(){
        $.ajax({
            type: 'post',
            data: {
                slg: "<?=$slgs?>",
                token: "<?=$token?>"
            },
            url: '<?=$domaine?>/controle/getnbrevotebycandidat',
            dataType: 'json',
            success: function(data){
                $('.getnbrevotebycand').html(data.getnbrevotebycand);
            }
        });
    }

    function chargeVote(){
        $.ajax({
            type: 'post',
            data: {
                token: "<?=$token?>"
            },
            url: '<?=$domaine?>/controle/getnbrevote',
            dataType: 'json',
            success: function(data){
                $('.getnbrevote').html(data.getnbrevote);
            }
        });
    }


    $('#formVote').submit(function(e){
        e.preventDefault();
        $('.loader').html('<i class="loader-btn"></i>');
        var value = document.getElementById('formVote');
        var form = new FormData(value);
        $.ajax({
            method: 'post',
            url: '<?=$domaine?>/controle/voter-save',
            data: form,
            contentType:false,
            cache:false,
            processData:false,
            success: function(data){
                if(data == "ok"){
                    chargeVote();
                    chargeVoteByCandidat();
                    $('#nom').val('');
                    $('#phone').val('');
                    $('.loader').html('<span class="loader">Voter maintenant</span>');
                    swal("Félicitation!","Vous avez voté avec succès !", "success");

                }else if(data == "1"){
                    $('#nom').val('');
                    $('#phone').val('');
                    $('.loader').html('<span class="loader">Voter maintenant</span>');
                    swal("Impossible!", "Vous ne pouvez pas voter ce numéro est invalide !", "error");
                }else if(data == "2"){
                    $('#nom').val('');
                    $('#phone').val('');
                    $('.loader').html('<span class="loader">Voter maintenant</span>');
                    swal("Impossible de voter!", "Vous avez déjà voté !", "warning");
                }else {
                    $('#nom').val('');
                    $('#phone').val('');
                    $('.loader').html('<span class="loader">Voter maintenant</span>');
                    swal("Impossible!", "Une erreur s\'est produite lors de l\'ajoiut de votre réponse", "error");
                }
            },
            error: function (error, ajaxOptions, thrownError) {
                alert(error.responseText);
            }
        });
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
</script>