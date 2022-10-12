<?php
require_once 'layout/header.php';
?>
<head>
    <style>
        .card_with_image {
            float: left;
            width: 100%;
            background: #fff;
            box-shadow: 0 1px 5px 0 rgb(5 5 5 / 20%);
            border-radius: 10px;
            padding-bottom: 0;
        }
        .box-heart-mble {
            padding: 3px 7px 2px 7px;
            top: 15px;
            right: 15px;
            color: #f83600;
            border-radius: 6px;
            background-color: rgba(0, 0, 0, 0.05);
        }

        .card_with_image .blog_card_image {
            background: #212121;
            display: block;
            text-align: center;
            border-radius: 10px 10px 0 0;
            overflow: hidden;
        }
        .box-cover {
            height: 150px;
            object-fit: cover;
        }
        .box-data {
            padding: 0 10px 15px 10px;
        }
        .box-img {
            width: 60px;
            height: 60px;
            border-radius: 50px;
            border: solid 4px #fff;
            position: relative;
            top: -25px;
        }
        .box-user {
            color: #696969;
            position: relative;
            top: -15px;
            font-size: 14px;
        }
        .box-heart {
            float: right;
            margin-top: 3px;
            padding: 3px 8px;
            color: #f83600;
        }
        .box-action-content {
            border-top: solid 1px #f0f0f0;
            padding-top: 15px;
            margin-top: 15px;
        }
        .box-action-star {
            float: left;
            margin-top: 5px;
        }

        .btn-orange-transparent {
            background: rgb(248 54 0 / 7%) !important;
            color: #f83600 !important;
            border-radius: 6px !important;
        }
        .box-btn {
            float: right;
            margin-bottom: 15px;
        }
        .buy-btn {
            padding: 3px 9px !important;
            font-size: 13px !important;
        }








    </style>
</head>

<section class="container-fluid head-pag" style="margin-top: 75px">
    <div class="container text-center" style="padding-top: 29px;">
        <h1>A propos</h1>
    </div>
</section>
<section class="about about-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <h2>Nouveaux microservices</h2>
                <p>Chaud devant, c'est frais et ça vient d'arriver</p>
            </div>
            <div class="col-md-3">
                <div class="grid-item">
                    <div class="card_with_image">
                        <div class="blog_card_image">
                            <a href="javascript:void(0);">
                                <img src="<?=$asset?>/media/bg-img.jpg" alt="" class="img-responsive box-cover">
                            </a>
                        </div>
                        <div class="box-data">
                            <a href="javascript:void(0);">
                                <img class="img-responsive box-img" src="<?=$asset?>/media/user.jpg" alt="">
                                <span class="box-user">Gnelezie</span>
                            </a>
                            <a href="#"><h6 class="box-title">There are many variations are many variations</h6></a>
                            <div class="box-action-content">
                                    <span class="box-action-star">
                                        <i class="fa fa-star-o box-star"></i>
                                        <i class="fa fa-star-o box-star"></i>
                                        <i class="fa fa-star-o box-star"></i>
                                        <i class="fa fa-star-o box-star"></i>
                                        <i class="fa fa-star-o box-star"></i>
                                    </span>
                                <a href="javascript:void(0)" class="buy-btn btn-orange-transparent box-btn">Voter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- container -->
</section>



<?php
require_once 'layout/footer.php';
?>


