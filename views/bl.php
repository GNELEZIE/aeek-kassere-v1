<div class="col-lg-8 col-md-12 col-xs-12 sticky-widget">
    <div class="blog-item single">
        <div class="image">
            <img src="<?=$domaine?>/uploads/<?=$data['couverture'];?>" alt="Blog image" class="img-responsive">
        </div>
        <!-- image -->
        <div class="blog-content">
            <div>
                <ul class="post-meta">
                    <li><a href="#"><span><?=(date('N', strtotime($data['date_article'])))?></span><?=month_fr(date('m', strtotime($data['date_article']))).','.date('Y', strtotime($data['date_article']))?></a></li>
                    <li><span class="icon flaticon-user"></span><a href="#">Par <?=$authors['nom']?></a></li>
                    <li><span class="icon flaticon-like"></span><a href="#">12 Like</a></li>
                    <li><span class="icon flaticon-chat"></span>
                        <a href="<?=$domaine?>/show/<?=$data['slug']?>">
                            <?=$nbrComt?>
                            <?php
                            if($nbrComt > 1){
                                echo 'Commentaires';
                            }else{
                                echo 'Commentaire';
                            }
                            ?>

                        </a>
                    </li>
                </ul>
                <!-- post-meta -->
                <div class="content">
                    <h4 style="line-height: 1.5;"><?=html_entity_decode(stripslashes($data['titre']));?></h4>
                    <div class="cont"><?=html_entity_decode(stripslashes($data['description']));?></div>
                </div>
                <!-- content -->
            </div>
        </div>
        <!-- blog-content -->
        <div class="post-bottom">
            <ul class="tags">
                <li><span style="text-transform: inherit !important;">Tags :</span></li>
                <?php
                $artTg = $article_tags->getArticle_tagsByArtId($data['id_article']);
                while($artT = $artTg->fetch()) {
                    $tags = $tag->getitagById($artT['tag_id'])->fetch();
                    ?>
                    <li><a href="#" style="background: #ffa5003b; color: #ff6809; border-radius: 6px; padding: 5px; margin: 5px;"><?=$tags['nom'];?></a></li>
                <?php
                }
                ?>


            </ul>
            <ul class="share event-social">
                <li><span style="text-transform: inherit !important;">Partager sur :</span></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- blog item -->

    <div class="comments"  id="rep">
        <h4>
            <?=$nbrComt?>
            <?php
            if($nbrComt > 1){

                echo 'Commentaires';
            }else{
                echo 'Commentaire';
            }
            ?>
        </h4>

        <ul>
            <?php
            while($com = $comments->fetch()){

                $rps = $reponse->getReponseById($com['id_comment'],$data['id_article']);
                if($com['nom'] == ''){
                    $nom ='Anonyme';
                }else{
                    $nom =$com['nom'];
                }
                ?>
                <li class="comment-item">
                    <div class="image"><img src="<?=$asset?>/media/anonym.png" alt="Blog image" class="img-responsive"></div>
                    <div class="com-content">
                        <h4><?=html_entity_decode(stripslashes($nom))?></h4>
                        <span><i class="fa fa-circle" aria-hidden="true"></i> <?=date_lettre($com['date_comment']);?> </span>
                        <p><?=html_entity_decode(stripslashes($com['message']))?></p>
                        <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$com['id_comment']?>" aria-expanded="false" aria-controls="flush-collapse<?=$com['id_comment']?>"><i class="fa fa-reply" aria-hidden="true"></i> Répondre</a>
                    </div>
                    <div class="accordion accordion-flush" id="reponse<?=$com['id_comment']?>">
                        <div class="accordion-item">
                            <div id="flush-collapse<?=$com['id_comment']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$com['id_comment']?>" data-bs-parent="#reponse<?=$com['id_comment']?>">
                                <div class="comment-form">
                                    <form method="post" id="formRepondre">
                                        <div class="succesR"></div>
                                        <div class="errosR"></div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-xs-12">
                                                <input type="text" name="nomR" id="nomR" placeholder="Nom*" class="comment-input input-style" required>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-xs-12">
                                                <input type="email" name="emailR" id="emailR" placeholder="Email*" class="comment-input input-style" required>
                                                <input type="hidden" class="form-control " name="formkey" value="<?= $token ?>">
                                                <input type="hidden" class="form-control " name="article_id" value="<?= $data['id_article'] ?>">
                                                <input type="hidden" class="form-control " name="com_id" id="com_id" value="<?=$com['id_comment']?>">
                                            </div>
                                        </div>
                                        <textarea rows="3" name="messageR" id="messageR" class="comment-input input-style" placeholder="Message"></textarea>
                                        <button type="submit" name="submit" class="comment-submit btn-transparence-orange mb-3" style="text-transform: inherit !important;font-weight: inherit !important;"> <i class="load"></i> Répondre</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <?php
                        while($respon = $rps->fetch()) {
                            if($respon['nom'] == ''){
                                $nomR ='Anonyme';
                            }else{
                                $nomR =$respon['nom'];
                            }
                            ?>
                            <li class="comment-item">
                                <div class="image"><img src="<?=$asset?>/media/anonym.png" alt="Blog image" class="img-responsive"></div>
                                <div class="com-content">
                                    <h4><?=html_entity_decode(stripslashes($nomR))?></h4>
                                    <span><i class="fa fa-circle" aria-hidden="true"></i><?=date_lettre($respon['date_reponse']);?></span>
                                    <p><?=html_entity_decode(stripslashes($respon['message']))?></p>
                                    <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$com['id_comment'].'_'.$respon['id_reponse']?>" aria-expanded="false" aria-controls="flush-collapse<?=$com['id_comment'].'_'.$respon['id_reponse']?>"><i class="fa fa-reply" aria-hidden="true"></i> Répondre</a>
                                </div>
                                <div class="accordion accordion-flush" id="reponse<?=$com['id_comment'].'_'.$respon['id_reponse']?>">
                                    <div class="accordion-item">
                                        <div id="flush-collapse<?=$com['id_comment'].'_'.$respon['id_reponse']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$com['id_comment'].'_'.$respon['id_reponse']?>" data-bs-parent="#reponse<?=$com['id_comment'].'_'.$respon['id_reponse']?>">
                                            <div class="comment-form">
                                                <form method="post" id="formRepondreR">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                                            <input type="text" name="nomR" id="nomR" placeholder="Nom*" class="comment-input input-style" required>
                                                            <input type="hidden" class="form-control " name="article_id" value="<?= $data['id_article'] ?>">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                                            <input type="email" name="emailR" id="emailR" placeholder="Email*" class="comment-input input-style" required>
                                                            <input type="hidden" class="form-control " name="formkey" value="<?= $token ?>">
                                                            <input type="hidden" class="form-control " name="com_id" id="com_id" value="<?=$com['id_comment']?>">
                                                            <input type="hidden" class="form-control " name="article_id" id="article_id" value="<?=$data['id_article']?>">
                                                        </div>
                                                    </div>
                                                    <textarea rows="3" name="messageR" id="messageR" class="comment-input input-style" placeholder="Message"></textarea>
                                                    <button type="submit" name="submit" class="comment-submit btn-transparence-orange mb-3" style="text-transform: inherit !important;font-weight: inherit !important;"> <i class="load"></i> Répondre</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        <?php
                        }
                        ?>
                    </ul>
                </li>

            <?php

            }
            ?>

        </ul>
    </div>
    <!-- comment -->
    <div class="comment-form">
        <h4>Commenter</h4>

        <form method="post" id="formComment">
            <div class="succes"></div>
            <div class="erros"></div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <input type="text" name="nom" id="nom" placeholder="Nom*" class="comment-input input-style" required>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <input type="email" name="email" id="email" placeholder="Email*" class="comment-input input-style" required>
                    <input type="hidden" class="form-control " name="formkey" value="<?= $token ?>">
                    <input type="hidden" class="form-control " name="article_id" value="<?= $data['id_article'] ?>">
                </div>
            </div>
            <textarea rows="6" name="message" id="message" class="comment-input input-style" placeholder="Message"></textarea>
            <button type="submit" name="submit" class="comment-submit" style="text-transform: inherit !important;font-weight: inherit !important;"> <i class="load"></i> Commenter</button>
        </form>
    </div>
    <!-- comment-form -->

</div>