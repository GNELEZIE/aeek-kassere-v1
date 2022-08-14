<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}
//echo $return;
//exit;
if(!isset($_SESSION['membreaeek'])){
    header('location:'.$domaine.'/connexion?return='.str_replace('+', '-', my_encrypt($return)));
    exit();
}

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>

    <div class="container-fluid bgbleu py-5">
        <div class="container py-5">
            <div class="row pt-5">
                <div class="col-md-3">
                    <div class="ts-box-comte">
                        <img src="<?=$asset?>/media/users/<?php if($_SESSION['membreaeek']['photo'] != ''){echo $_SESSION['membreaeek']['photo'];}else{echo 'default.png';}?>" id="img" alt=""/>
                        <div class="btnedit text-center" style="padding-top: 30px;">
                            <a href="javascript:void(0);" class="btn-transparence-orange btn-edit" id="btn-img"> <i class="fa fa-edit"></i> Modifier la photo</a>
                        </div>
                        <div class="tsbox-footer text-center pt-3">
                            <h3 class="font-17">Ouattara Zie</h3>
                            <small>ouattara@gmail.com</small>
                        </div>
                    </div>
                    <form method="post" id="userImgForm">
                        <input type="file" name="userImg" id="userImg" style="display: none"/>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="box-header text-center">
                        <h3 class="font-20">Informations personnelles</h3>
                    </div>
                    <div class="box-body bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Nom : Ouattara</p>
                            </div>
                            <div class="col-md-6">
                                <p>Prénom : Arouna Gnelezie</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Email : Ouattara@gmail.com</p>
                            </div>
                            <div class="col-md-6">
                                <p>Fonction : Etudiant</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Téléphone : +225 05 46 85 99 36</p>
                            </div>
                            <div class="col-md-6">
                                <p>Adresse : Abidjan Adjamé</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once 'layout/footer.php';
?>
<script>
    $('#btn-img').click(function(e){
        e.preventDefault();
        $('#userImg').trigger('click');
    });

    //fonction vue image télécharger
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#userImg').change(function(e){
        e.preventDefault();
        $('.loader').css('display','block');
        var value = document.getElementById('userImgForm');
        var form = new FormData(value);
        $.ajax({
            method: 'post',
            url: '<?=$domaine?>/controller/photo.save.php',
            data: form,
            contentType:false,
            cache:false,
            processData:false,
            dataType: 'json',
            success: function(data){
                if(data.data_info == "ok"){
                    $('#img').attr('src', data.data_photo);
                }else {
                    swal("Action Impossible !", "Une erreur s\'est produite lors du traitement des données !", "error");
                }
                $('.loader').css('display','none');
            },
            error: function (error, ajaxOptions, thrownError) {
                alert(error.responseText);
            }
        });
    });

    //        $('#sendProfil').click(function(e){
    //            e.preventDefault();
    //            $('.loader').css('display','block');
    //            var value = document.getElementById('profilForm');
    //            var form = new FormData(value);
    //            $.ajax({
    //                method: 'post',
    //                url: 'controller/profil.update.php',
    //                data: form,
    //                contentType:false,
    //                cache:false,
    //                processData:false,
    //                dataType: 'json',
    //                success: function(data){
    //                    alert(data.data_info);
    //                    if(data.data_info == "ok"){
    //                        $('.succes').html(' <div class="alert alert-success">Votre profil a été modifié avec succès !</div>');
    //                    }else {
    //                        swal("Action Impossible !", "Une erreur s\'est produite lors du traitement des données !", "error");
    //                    }
    //                    $('.loader').css('display','none');
    //                }
    //                ,
    //                error: function (error, ajaxOptions, thrownError) {
    //                    alert(error.responseText);
    //                }
    //            });
    //        });
</script>