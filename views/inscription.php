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
                        <form method="post" class="text-center" id="formInscription">
                            <?php
                            if(!empty($errors)) { ?>
                                <div class="alert alert-danger mb-0 mt-2 p-1" style="font-size: 13px" role="alert">
                                    <?php foreach( $errors as $error){  ?>
                                        <?=$error?>
                                    <?php }?>
                                </div>
                            <?php } ?>

                            <div class="row">
                                <div class="col-md-6 pt-4">
                                    <input type="text" name="nom" placeholder="Nom" class="input-register">
                                </div>
                                <div class="col-md-6  pt-4">
                                    <input type="text" name="prenom" placeholder="Prénom" class="input-register" required>
                                    <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                                </div>
                                <div class="col-md-12 pt-4 text-left">
                                    <label for="phone">Téléphone <i class="required"></i></label>
                                    <input type="tel" class="form-control input-style" id="phone" name="phone" required>
                                    <input type="hidden"  name="isoPhone" id="isoPhone" value="">
                                    <input type="hidden"  name="dialPhone" id="dialPhone" value="">
                                </div>
                                <div class="col-md-12  pt-4">
                                    <input type="text" name="ville" placeholder="Ville" class="input-register" value="<?=$city?>" required>
                                </div>
                                <div class="col-md-12 pt-4">
                                    <input type="password" name="password" placeholder="Mot de passe" class="input-register" required>
                                </div>
                                <div class="col-md-12 pt-4">
                                    <input type="password" name="passwordC" placeholder="Confirmer mot de passe" class=" input-register mt-0" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6  pt-4">
                                    <div class="form-group">
                                        <div class="text-left">
                                            <p class="font-13 m-0 pb-2" style="line-height: 1.3;">La photo de votre pièce (format accepté: jpg, png, jpeg) <i class="required"></i></p>
                                        </div>
                                        <div class="form-label-group pieceDiv">
                                            <span class="file-msg"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera mb-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg><br/>Cliquez ou glissez déposez la photo de votre pièce</span>
                                            <input type="file" class="file-input input-piece" name="piece" id="piece" accept=".png, .jpg, .jpeg" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6  pt-4">
                                    <div class="form-group">
                                        <div class="text-left">
                                            <p class="font-13 m-0 pb-2" style="line-height: 1.3;">Votre photo (format accepté: jpg, png, jpeg) <i class="required"></i></p>
                                        </div>
                                        <div class="form-label-group photoDiv">
                                            <span class="file-msg"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera mb-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg><br/>Cliquez ou glissez déposez votre photo</span>
                                            <input type="file" class="file-input input-photo" name="photo" id="photo" accept=".png, .jpg, .jpeg" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 pt-3 pb-3 text-left">
                                <input type="checkbox" class="custom-control-input " id="register-check" required="">
                                <label class="custom-control-label" for="register-check">Je suis élève ou étudiant de Kasséré</label>
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
<script>

    var photoDiv = $('.photoDiv');
    var inputPiece = $('.input-piece');
    var inputPhoto = $('.input-photo');

    function readURLPhoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var fileType = input.files[0]['type'];
            var valideImage = ["image/jpg","image/jpeg","image/png"];

            reader.onload = function (e) {
                if($.inArray(fileType, valideImage) < 0){
                    $('.file-msg').html('<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera mb-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg><br/>Cliquez ou glissez déposez la photo de couverture');
                    inputPhoto.val('');
                    inputPhoto.attr('src', '');
                    swal("Oups format non autorisé !","Les formats acceptés sont : jpg, jpeg et png !","error");
                }else{
                    photoDiv.css('background-image', 'url('+e.target.result+')');
                }

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    inputPhoto.on('dragenter focus click', function() {
        photoDiv.addClass('is-active');
    });

    inputPhoto.on('dragleave blur drop', function() {
        photoDiv.removeClass('is-active');
    });

    inputPhoto.on('change', function() {

        var filesCount = $(this)[0].files.length;
        var textContainer = $(this).prev();
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textContainer.text(fileName);
        } else {
            textContainer.html('<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera mb-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg><br/>Cliquez ou glissez déposez la photo de couverture');
        }
        readURLPhoto(this);
    });

</script>
<script>

    var pieceDiv = $('.pieceDiv');
    var inputPiece = $('.input-piece');
    var inputPhoto = $('.input-photo');

    function readURLPiece(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var fileType = input.files[0]['type'];
            var valideImage = ["image/jpg","image/jpeg","image/png"];

            reader.onload = function (e) {
                if($.inArray(fileType, valideImage) < 0){
                    $('.file-msg').html('<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera mb-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg><br/>Cliquez ou glissez déposez la photo de couverture');
                    inputPiece.val('');
                    inputPiece.attr('src', '');
                    swal("Oups format non autorisé !","Les formats acceptés sont : jpg, jpeg et png !","error");
                }else{
                    pieceDiv.css('background-image', 'url('+e.target.result+')');
                }

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    inputPiece.on('dragenter focus click', function() {
        pieceDiv.addClass('is-active');
    });

    inputPiece.on('dragleave blur drop', function() {
        pieceDiv.removeClass('is-active');
    });

    inputPiece.on('change', function() {

        var filesCount = $(this)[0].files.length;
        var textContainer = $(this).prev();
        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textContainer.text(fileName);
        } else {
            textContainer.html('<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera mb-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg><br/>Cliquez ou glissez déposez la photo de couverture');
        }
        readURLPiece(this);
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