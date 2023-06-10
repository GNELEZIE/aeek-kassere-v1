<?php



require_once 'controller/sortie-save.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 banner-caofa">
    <div class="container">
        <div class="row pt-5">

            <div class="col-md-3 col3-award">
                <div class="grid-item">
                    <div class="card_with_image">
                        <div class="blog_card_image">
                            <a href="<?=$domaine?>/awards/">
                                <img src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="" class="img-responsive box-cover">
                            </a>
                        </div>
                        <div class="box-data">
                            <div class="mobile-none">
                                <a href="<?=$domaine?>/awards/">
                                    <img class="img-responsive box-img" src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="">
                                    <span class="box-user">Gnele Ouattara</span>
                                    <input type="hidden" id="nom" name="nom" value=""/>
                                </a>
                            </div>
                            <div class="pc-none">
                                <p class="mb-0 py-2 name-mobile">Salimata</p>
                            </div>

                            <a href="<?=$domaine?>/awards/" class="h6-award box-title ">
                                <p class="mb-0" style="line-height: 17px;">Etudiante</p>
                            </a>
                            <div class="box-action-content">
                                    <span class="box-action-star" id="reload">
                                       <input type="hidden" id="voix" name="voix" value=""/>
                                        <span class="voi"></span>
                                    </span>
                                <div class="changeEt">
                                    <a class="vote-btn btn-greens-transparent box-btn font-9">Déjà voté</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="col-md-3 col3-award">
                <div class="grid-item">
                    <div class="card_with_image">
                        <div class="blog_card_image">
                            <a href="<?=$domaine?>/awards/">
                                <img src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="" class="img-responsive box-cover">
                            </a>
                        </div>
                        <div class="box-data">
                            <div class="mobile-none">
                                <a href="<?=$domaine?>/awards/">
                                    <img class="img-responsive box-img" src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="">
                                    <span class="box-user">Gnele Ouattara</span>
                                    <input type="hidden" id="nom" name="nom" value=""/>
                                </a>
                            </div>
                            <div class="pc-none">
                                <p class="mb-0 py-2 name-mobile">Salimata</p>
                            </div>

                            <a href="<?=$domaine?>/awards/" class="h6-award box-title ">
                                <p class="mb-0" style="line-height: 17px;">Etudiante</p>
                            </a>
                            <div class="box-action-content">
                                    <span class="box-action-star" id="reload">
                                       <input type="hidden" id="voix" name="voix" value=""/>
                                        <span class="voi"></span>
                                    </span>
                                <div class="changeEt">
                                    <a class="vote-btn btn-greens-transparent box-btn font-9">Déjà voté</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="col-md-3 col3-award">
                <div class="grid-item">
                    <div class="card_with_image">
                        <div class="blog_card_image">
                            <a href="<?=$domaine?>/awards/">
                                <img src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="" class="img-responsive box-cover">
                            </a>
                        </div>
                        <div class="box-data">
                            <div class="mobile-none">
                                <a href="<?=$domaine?>/awards/">
                                    <img class="img-responsive box-img" src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="">
                                    <span class="box-user">Gnele Ouattara</span>
                                    <input type="hidden" id="nom" name="nom" value=""/>
                                </a>
                            </div>
                            <div class="pc-none">
                                <p class="mb-0 py-2 name-mobile">Salimata</p>
                            </div>

                            <a href="<?=$domaine?>/awards/" class="h6-award box-title ">
                                <p class="mb-0" style="line-height: 17px;">Etudiante</p>
                            </a>
                            <div class="box-action-content">
                                    <span class="box-action-star" id="reload">
                                       <input type="hidden" id="voix" name="voix" value=""/>
                                        <span class="voi"></span>
                                    </span>
                                <div class="changeEt">
                                    <a class="vote-btn btn-greens-transparent box-btn font-9">Déjà voté</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="col-md-3 col3-award">
                <div class="grid-item">
                    <div class="card_with_image">
                        <div class="blog_card_image">
                            <a href="<?=$domaine?>/awards/">
                                <img src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="" class="img-responsive box-cover">
                            </a>
                        </div>
                        <div class="box-data">
                            <div class="mobile-none">
                                <a href="<?=$domaine?>/awards/">
                                    <img class="img-responsive box-img" src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="">
                                    <span class="box-user">Gnele Ouattara</span>
                                    <input type="hidden" id="nom" name="nom" value=""/>
                                </a>
                            </div>
                            <div class="pc-none">
                                <p class="mb-0 py-2 name-mobile">Salimata</p>
                            </div>

                            <a href="<?=$domaine?>/awards/" class="h6-award box-title ">
                                <p class="mb-0" style="line-height: 17px;">Etudiante</p>
                            </a>
                            <div class="box-action-content">
                                    <span class="box-action-star" id="reload">
                                       <input type="hidden" id="voix" name="voix" value=""/>
                                        <span class="voi"></span>
                                    </span>
                                <div class="changeEt">
                                    <a class="vote-btn btn-greens-transparent box-btn font-9">Déjà voté</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="col-md-3 col3-award">
                <div class="grid-item">
                    <div class="card_with_image">
                        <div class="blog_card_image">
                            <a href="<?=$domaine?>/awards/">
                                <img src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="" class="img-responsive box-cover">
                            </a>
                        </div>
                        <div class="box-data">
                            <div class="mobile-none">
                                <a href="<?=$domaine?>/awards/">
                                    <img class="img-responsive box-img" src="<?=$domaine?>/uploads/63400bcbb0b81.jpg" alt="">
                                    <span class="box-user">Gnele Ouattara</span>
                                    <input type="hidden" id="nom" name="nom" value=""/>
                                </a>
                            </div>
                            <div class="pc-none">
                                <p class="mb-0 py-2 name-mobile">Salimata</p>
                            </div>

                            <a href="<?=$domaine?>/awards/" class="h6-award box-title ">
                                <p class="mb-0" style="line-height: 17px;">Etudiante</p>
                            </a>
                            <div class="box-action-content">
                                    <span class="box-action-star" id="reload">
                                       <input type="hidden" id="voix" name="voix" value=""/>
                                        <span class="voi"></span>
                                    </span>
                                <div class="changeEt">
                                    <a class="vote-btn btn-greens-transparent box-btn font-9">Déjà voté</a>
                                </div>
                            </div>
                        </div>
                    </div>
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