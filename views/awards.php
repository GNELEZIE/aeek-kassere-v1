<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}
if(isset($doc[1]) and !isset($doc[2])) {

    $list = $candidat->getCandidatBySlug($doc[1]);

    if ($dataCan = $list->fetch()){

    }else {
        header('location:' . $domaine . '/error');
        exit();
    }
}else{
    if(isset($_GET['page']) and is_numeric($_GET['page'])){
        $numPage = $_GET['page'];
        $fin = 12 * $numPage;
        $debut = $fin - 12;
    }else{
        $numPage = 1;
        $debut = 0;
        $fin = 12;
    }

    $res = $candidat->getNbCandidat();

    if($nbre = $res->fetch()){
        $pages = ceil($nbre['nb']/12);
    }else{
        $pages = 1;
    }
    $pagination_list = '';
    $myPage = '/awards';
    $liste = $candidat->getAllCandidatLimit($debut,$fin);
}

require_once 'layout/header.php';
?>

<section class="container-fluid bg-award he-300" style="margin-top: 75px">
  <div class="container">
      <h1 class="prim-text">PRIM<span class="text-green">’</span>MA </h1>
      <p class="text-center prim-textSous text-white">Prix du meilleur membre de l'AEEK</p>
  </div>
</section>
<section class="about about-two sec-award">
<div class="container">
    <?php
    if(isset($doc[1]) and !isset($doc[2])) {
        $nVot = $voter->getNbrVote();
        if($nbrVot = $nVot->fetch()){
            $valVote =  $nbrVot['nb'];
        }else{
            $valVote = 0;
        }
        ?>
        <div class="row pt-5">
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="speaker-image">
                    <img src="<?=$domaine?>/uploads/<?=$dataCan['photo']?>" alt="speaker image" class="cand-img img-responsive">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="speaker-content">
                    <h4 class="pb-2 name-titlte"><?=html_entity_decode(stripslashes($dataCan['nom'])).' '.html_entity_decode(stripslashes($dataCan['prenom']))?></h4>
                    <span><?=html_entity_decode(stripslashes($dataCan['fonction']))?></span>
                    <p><?=html_entity_decode(stripslashes($dataCan['bio']))?></p>
                    <ul class="speaker-address pb-3">
                        <li><span>Votant : </span> <?=$valVote?></li>
                        <li><span>Voix obtenu : </span> <?=$dataCan['nbvote']?></li>
                    </ul>
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Faeek-kassere.com%2Fawards%2F&layout=button_count&size=small&appId=415380650804169&width=91&height=20" width="91" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <?php
                    $ip   = $_SERVER['REMOTE_ADDR'];
                    $votes = $voter->getVoterByIp($ip);
                    if($votesData = $votes->fetch()){
                        $btnVot = '<a class="buy-btn btn-greens-transparent box-btns mt-3">Vous avez déjà voté</a>';
                    }else{
                        $btnVot = '<div class="pt-5"  id="changeEtats" ><a href="javascript:void(0)" class="btn-orange-transparent box-btns" onclick="voter('.$dataCan['id_candidat'].')">Voter maintenant</a></div>';
                    }
                    ?>
                    <?=$btnVot?>
                </div>
            </div>
        </div>
    <?php
    }else{
        ?>
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                        <div class="up-event-text awards-up">
                            <div class="event-count-sect">
                                <div class="event-countdown-counter-sec">
                                    <div class="counter-item">
                                        <span class="counter-label text-noire">Jours</span>
                                        <span class="single-cont"> <i id="days">00</i> </span>
                                    </div>
                                    <div class="counter-item">
                                        <span class="counter-label text-noire">heure</span>
                                        <span class="single-cont"> <i id="hours">00</i> </span>
                                    </div>
                                    <div class="counter-item">
                                        <span class="counter-label text-noire">min</span>
                                        <span class="single-cont"> <i id="minutes">00</i> </span>
                                    </div>
                                    <div class="counter-item">
                                        <span class="counter-label text-noire">S</span>
                                        <span class="single-cont"> <i id="second"></i> </span>
                                    </div>
                                </div>
                            </div>

                </div>
                <h4 class="pb-3">Vous pouvez voter pour votre membre préferé</h4>
            </div>
            <?php
            //                $liste = $candidat->getAllCandidat();
            while($dataCandidat = $liste->fetch()){
                $ip   = $_SERVER['REMOTE_ADDR'];
                $votes = $voter->getVoterByIp($ip);
                $vot = $voter->getAllVote();
                if($votDat = $vot->fetch()){
                    $totalV = $voter->getNbrVote()->fetch();
                    $pourcent = pourcentage($totalV['nb'],$dataCandidat['nbvote']);
                }else{
                    $pourcent ='0 %';
                }

                if($votesData = $votes->fetch()){
                    $btnVote = '<a class="vote-btn btn-greens-transparent box-btn font-9">Déjà voté</a>';
                }else{
                    $btnVote = '<div  id="changeEtat" ><a href="javascript:void(0)" class="buy-btn btn-orange-transparent box-btn" onclick="voter('.$dataCandidat['id_candidat'].')">Voter</a></div>';
                }
                ?>
                <div class="col-md-3 col3-award">
                    <div class="grid-item">
                        <div class="card_with_image">
                            <div class="blog_card_image">
                                <a href="<?=$domaine?>/awards/<?=$dataCandidat['slug']?>">
                                    <img src="<?=$domaine?>/uploads/<?=$dataCandidat['photo']?>" alt="" class="img-responsive box-cover">
                                </a>
                            </div>
                            <div class="box-data">
                                <div class="mobile-none">
                                    <a href="<?=$domaine?>/awards/<?=$dataCandidat['slug']?>">
                                        <img class="img-responsive box-img" src="<?=$domaine?>/uploads/<?=$dataCandidat['photo']?>" alt="">
                                        <span class="box-user"><?=html_entity_decode(stripslashes($dataCandidat['prenom']))?></span>
                                        <input type="hidden" id="nom" name="nom" value="<?=html_entity_decode(stripslashes($dataCandidat['prenom']))?>"/>
                                    </a>
                                </div>
                                <div class="pc-none">
                                    <p class="mb-0 py-2 name-mobile"><?=html_entity_decode(stripslashes($dataCandidat['prenom']))?></p>
                                </div>

                                <a href="<?=$domaine?>/awards/<?=$dataCandidat['slug']?>" class="h6-award box-title ">
                                    <p class="mb-0" style="line-height: 17px;"><?=html_entity_decode(stripslashes($dataCandidat['fonction']))?></p>
                                </a>
                                <div class="box-action-content">
                                    <span class="box-action-star" id="reload<?=$dataCandidat['id_candidat']?>">
                                       <input type="hidden" id="voix" name="voix" value="<?=$dataCandidat['nbvote']?>"/>
                                        <span class="voi"><?=$pourcent?></span>
                                    </span>
                                   <div class="changeEt">
                                       <?=$btnVote?>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>
<?php
if(isset($doc[0]) and !isset($doc[1])){
    ?>
    <div class="text-center wow bounceInUp center">
        <ul class="pagination" style="display: inherit !important;">
            <?php
            if(isset($_GET['page']) and is_numeric($_GET['page'])){
                if($pages < 2 ){
                    $pagination_list = '
                                            <li><a href="javascript:void(0)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0)"  class="active">1</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                }else{
                    if($_GET['page'] > 1 ){
                        $prec = $_GET['page']-1;
                        $pagination_list .= '
                                           <li> <a href="'.$domaine.$myPage.'?page='.$prec.'"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                    }else{
                        $prec = 1;
                        $pagination_list .= '
                                           <li><a href="javascript:void(0)" style="cursor: not-allowed"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                    }

                    if($pages > 5){
                        for($i = 1; $i <= $pages ; $i++){
                            if($_GET['page'] > 2){
                                if($i > $_GET['page']-2 and $i < $_GET['page']+2){
                                    if($i != $pages){
                                        if($i == $_GET['page']){
                                            $pagination_list .='
                                                                 <li class="active"><a href="javascript:void(0)">'.$i.'</a></li>
                                                            ';
                                        }else{
                                            if($i < 3){
                                                $pagination_list .='
                                                                 <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                            ';
                                            }else{
                                                $pagination_list .='
                                                                 <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                            ';
                                            }
                                        }
                                    }
                                }
                            }else{
                                if($i < 6){
                                    if($i == $_GET['page']){
                                        $pagination_list .='
                                                             <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                        ';
                                    }else{
                                        if($i < 3){
                                            $pagination_list .='
                                                             <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                        ';
                                        }else{
                                            $pagination_list .='
                                                             <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                        ';
                                        }
                                    }
                                }
                            }
                        }
                        if($_GET['page'] < $pages-2){
                            $pagination_list .='
                                                    <li class="hidden-xs"><a href="javascript:void(0)">...</a></li>
                                                ';
                        }
                        if($_GET['page'] == $pages){
                            $pagination_list .='
                                                    <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                ';
                        }else{
                            $pagination_list .='
                                                    <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$pages.'">'.$pages.'</a></li>
                                                ';
                        }
                    }else{
                        for($i = 1; $i <= $pages ; $i++){
                            if($i == $_GET['page']){
                                $pagination_list .='
                                                        <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                ';
                            }else{
                                if($i < 3){
                                    $pagination_list .='
                                                    <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                ';
                                }else{
                                    $pagination_list .='
                                                    <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                ';
                                }
                            }
                        }
                    }

                    if($_GET['page'] < $pages ){
                        $suiv = $_GET['page']+1;
                        $pagination_list .= '
                                            <li><a href="'.$domaine.$myPage.'?page='.$suiv.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                    }else{
                        $suiv = $pages;
                        $pagination_list .= '
                                            <li><a href="javascript:void(0)" style="cursor: not-allowed"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                    }

                }
            }else{
                if($pages < 2 ){
                    $pagination_list = '
                                            <li><a href="javascript:void(0)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0)"  class="active">1</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                }else{
                    $pagination_list .= '
                                            <li><a href="javascript:void(0)" style="cursor: not-allowed"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                    if($pages > 5){
                        for($i = 1; $i <= $pages ; $i++){
                            if($i < 6){
                                if($i == 1){
                                    $pagination_list .='
                                                            <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                        ';
                                }else{
                                    if($i < 3){
                                        $pagination_list .='
                                                            <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                        ';
                                    }else{
                                        $pagination_list .='
                                                            <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                        ';
                                    }
                                }
                            }
                        }
                        $pagination_list .='
                                                    <li class="hidden-xs"><a href="javascript:void(0)">...</a></li>
                                            ';
                        $pagination_list .='
                                                    <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$pages.'">'.$pages.'</a></li>
                                            ';
                    }else{
                        for($i = 1; $i <= $pages ; $i++){
                            if($i == 1){
                                $pagination_list .='
                                                        <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                    ';
                            }else{
                                if($i < 3){
                                    $pagination_list .='
                                                    <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                    ';
                                }else{
                                    $pagination_list .='
                                                    <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                    ';
                                }
                            }
                        }
                    }
                    $pagination_list .= '
                                            <li><a href="'.$domaine.$myPage.'?page='.(1+1).'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                }
            }
            ?>
            <?=$pagination_list?>
        </ul>
    </div>
<?php
}
?>

</section>



<?php
require_once 'layout/footer.php';
?>
<script>
    $(document).ready(function(){
        var dateEvents = $('#dateEvents').val();
        var countDownDate = new Date("2022-12-23 00:00:00").getTime();

        var x = setInterval(function() {

            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $("#days").html(days);
            $("#hours").html(hours);
            $("#minutes").html(minutes);
            $("#second").html(seconds);

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    });
</script>
<script>

    function voter(id = null,name){
        var nom = $('#nom').val();
        var nbr1 = $('#voix').val();
        var nbr2 = 1;
        var nbVoixs = parseInt(nbr1) + nbr2;

        if(id){
            swal({
                    title: "Voulez vous voter ?",
                    text: "L'action va voter  pour la personne  sélectionnée",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Oui, Voter",
                    cancelButtonText: "Non, annuler",
                    closeOnConfirm: false
                },

                function(isConfirm){
                    if (isConfirm) {
                        $.post('<?=$domaine?>/controle/voter-save', {id : id}, function (data) {
                            if(data == "ok"){
                                $('#changeEtat').html('<a class="vote-btn btn-greens-transparent box-btn font-9">Déjà voté</a>');
//                                $('#reload'+id).load(location.href + '#reload'+id);
                                swal("Félicitation, vous avez voté avec succès!","", "success");
                            }else if(data == "1"){
                                swal("Impossible de voter plus d'une fois !", "Vous avez déjà voté donc vous pouvez plus voter", "info");
                            }else{
                                swal("Impossible de voter!", "Une erreur s'est produite lors du traitement des données.", "error");
                            }
                        });
                    }
                });
        }else{
            alert('actualise');
        }
    }
</script>
