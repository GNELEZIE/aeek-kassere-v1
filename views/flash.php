<?php
$liste = $article->getAllArticle();

require_once 'layout/header.php';
?>

<link href="<?=$asset?>/plugins/ticker/css/main.css" rel="stylesheet">




    <div class="white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6 centered">
                    <div id="nt-example2-container">
                        <ul id="nt-example2">
                            <?php

                            while($dat = $liste->fetch()) {
                            ?>
                                <li data-infos="<?=reduit_text(html_entity_decode(stripslashes($dat['description'])),'500');?>">
                                    <i class="fa fa-fw fa-play state"></i>
                                    <span class="hour">08:12</span> <?=html_entity_decode(stripslashes($dat['titre']));?>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    require_once 'layout/footer.php';
    ?>
    <script src="<?=$asset?>/plugins/ticker/js/jquery.newsTicker.js"></script>
    <script>


        var nt_example2 = $('#nt-example2').newsTicker({
            row_height: 60,
            max_rows: 1,
            speed: 300,
            duration: 6000,
            prevButton: $('#nt-example2-prev'),
            nextButton: $('#nt-example2-next'),
            hasMoved: function() {
                $('#nt-example2-infos-container').fadeOut(200, function(){
                    $('#nt-example2-infos .infos-hour').text($('#nt-example2 li:first span').text());
                    $('#nt-example2-infos .infos-text').text($('#nt-example2 li:first').data('infos'));
                    $(this).fadeIn(400);
                });
            },
            pause: function() {
                $('#nt-example2 li i').removeClass('fa-play').addClass('fa-pause');
            },
            unpause: function() {
                $('#nt-example2 li i').removeClass('fa-pause').addClass('fa-play');
            }
        });
        $('#nt-example2-infos').hover(function() {
            nt_example2.newsTicker('pause');
        }, function() {
            nt_example2.newsTicker('unpause');
        });
        var state = 'stopped';
        var speed;
        var add;



    </script>


    </body>
    </html>

