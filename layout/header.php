<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AEEK - KASSERE</title>
<link rel="icon" href="<?=$asset?>/media/logoAEEK.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i%7CPoppins:300,400,500,600,700"
      rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Archivo:400,500,600,700|Oswald:200,300,400,500,600,700"
      rel="stylesheet">
<link href="<?=$asset?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=$asset?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=$asset?>/flaticon/flaticon.css" rel="stylesheet">
<link href="<?=$asset?>/css/swiper.min.css" rel="stylesheet">
<link href="<?=$asset?>/css/lightcase.css" rel="stylesheet">
<link href="<?=$asset?>/css/quick-view.css" rel="stylesheet">
<link href="<?=$asset?>/css/jquery.nstSlider.css" rel="stylesheet">
<link href="<?=$asset?>/css/flexslider.css" rel="stylesheet">
<link href="<?=$asset?>/css/banner-bg.css" rel="stylesheet">
<link href="<?=$asset?>/css/style.css" rel="stylesheet">
<link href="<?=$asset?>/css/header.css" rel="stylesheet">
<link href="<?=$asset?>/css/index-9.css" rel="stylesheet">
<link href="<?=$asset?>/css/responsive.css" rel="stylesheet">
<link href="<?=$asset?>/css/headers.css" rel="stylesheet">
<link href="<?=$asset?>/css/font-size.css" rel="stylesheet">
<link href="<?=$asset?>/css/btn.css" rel="stylesheet">
<link href="<?=$asset?>/plugins/ticker/css/main.css" rel="stylesheet">
<link href="<?=$asset?>/plugins/sweetalert/sweet-alert.css" rel="stylesheet" />
<!--<link href="cplugins/animate/animate.min.css" rel="stylesheet" />-->
<!--<link href="--><?//=$asset?><!--/plugins/lity/assets/style.css" media="all" rel="stylesheet" type="text/css">-->
<!--<link href="--><?//=$asset?><!--/plugins/lity/assets/prism.css" media="all" rel="stylesheet" type="text/css">-->
<link href="<?=$asset?>/plugins/lity/dist/lity.css" rel="stylesheet"/>
<link rel="stylesheet" href="<?=$asset?>/plugins/ani/animate.css"/>
<style>

.btn-edit{
    padding: 10px 20px;
    border-radius: 6px;
}

.text-right{
    text-align : right !important;
}
.required:before {
    content: "*";
    color: red;
}

.w-70{
    width : 70% !important;
}
.w-30{
    width : 30% !important;
}

.li-connect{
    padding-right : 15px !important;
}

.btnedit{
    padding-top: 30px;
}



.bgimg2{
    background: url("<?=$asset?>/media/aeek-2.jpeg") !important;
    background-size: cover !important;
    background-position: top !important;
}
.bgimg1{
    background: url("<?=$asset?>/img/bg/bg1.png") !important;
}
.bgbleu{
    background: rgb(232 246 255 / 31%) !important;
}
.bg-bleu-transparent{
    background: #00bfff0d !important;
}
.ts-box-comte{
    background-color: #fff;
    box-shadow: 0 0.125rem 0.3125rem rgb(0 0 0 / 10%);
    border-radius: 6px;
    padding-bottom: 10px;
}
.box-header h3{
   color: #fff;
}
.box-header{
    background: #ff4600;
    padding: 17px;
    border-radius: 10px 10px 0 0;
    box-shadow: 0 0.125rem 0.3125rem rgb(0 0 0 / 10%);
}

.ts-box{
    background-color: #fff;
    margin-bottom: 2rem;
    box-shadow: 0 0.125rem 0.3125rem rgb(0 0 0 / 10%);
    padding: 1.5rem;
    position: relative;
    border-radius: 6px;
}
.text-left{
    text-align: left !important;
}
.input-register{
    border: 2px solid #ced4da !important;
    box-shadow: none !important;
    background: none !important;
    text-align: left !important;
    cursor: auto;
    border-radius: 6px;
    width: 100% !important;
    padding: 10px !important;
}
.input-styles{
    border: 2px solid #ced4da !important;
    box-shadow: none !important;
    background: none !important;
    text-align: left !important;
    cursor: auto;
    border-radius: 6px;
    width: 100% !important;
}
.event-social li a {
    font-size: 15px !important;
    height: 35px !important;
    width: 35px !important;
}
footer p {
    color: #696969 !important;
    font-size: 13px !important;
    text-align: left !important;
}
footer h2 {
    color: #696969 !important;
    font-size: 23px !important;
    text-align: left !important;
}
footer ul{
    text-align: left !important;
}
.h-339{
    height: 339px !important;
}
.ribban{
    position: absolute;
    top: 0;
    right: 0;
    color: #fff;
    background: #ff0909;
    padding: 4px 15px;
    border-radius: 0 6px 0 50px;
    border-top: 24px !important;
}
.box-card::after {
    display: block;
    position: absolute;
    bottom: -10px;
    left: 20px;
    width: calc(100% - 40px);
    height: 35px;
    background-color: #fff;
    -webkit-box-shadow: 0 19px 28px 5px rgba(64,64,64,0.09);
    box-shadow: 0 19px 28px 5px rgba(64,64,64,0.09);
    content: '';
    z-index: -1;
}
a.box-card {
    text-decoration: none;
}

.box-card {
    position: relative;
    border: 0;
    border-radius: 0;
    background-color: #fff;
    -webkit-box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09);
    box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09);
}
.box-card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,0.125);
    border-radius: .25rem;
}

.box-shadow {
    -webkit-box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09) !important;
    box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09) !important;
}

.ml-auto, .mx-auto {
    margin-left: auto !important;
}
.mr-auto, .mx-auto {
    margin-right: auto !important;
}
.rounded-circle {
    border-radius: 50% !important;
}
.bg-white {
    background-color: #fff !important;
}
.box-body{
    padding: 20px;
    box-shadow: 0 0.125rem 0.3125rem rgb(0 0 0 / 10%);
}

.ml-auto, .mx-auto {
    margin-left: auto !important;
}

.mr-auto, .mx-auto {
    margin-right: auto !important;
}
.d-block {
    display: block !important;
}
img, figure {
    max-width: 100%;
    height: auto;
    vertical-align: middle;
}

.box-card-text {
    padding-top: 12px;
    color: #8c8c8c;
}

.text-sm {
    font-size: 12px !important;
}
p, .p {
    margin: 0 0 16px;
}

.box-card-title {
    margin: 0;
    font-family: "Montserrat",sans-serif;
    font-size: 18px;
    font-weight: 900;
}

.pt-1, .py-1 {
    padding-top: .25rem !important;
}

.head-icon{
    margin-top:18px;
    color:#FF4500;
width: 51px;
}
 .offre-icon{
     object-fit: cover;
     height: 90px;
     width: 90px;
     border-radius: 50px;
     margin-top: 0;
 }

#flash-infos{
    height: 275px !important;
}
#flash-infos li{
   background: inherit !important;
    height: 140px !important;
    padding: 0 !important;
    border-bottom : 0 !important;

}
#flash-infos-container {
    padding: 15px !important;

}
.heure-box span{
    border: 2px solid #ff7729;
    padding: 12px;
    border-bottom: 0;
    color: #fff;
    background: #ff7729;
}
.liBars{
    margin: 15px !important;
}
.color-orange{
    color: #ff7729 !important;
}
.infos-bars{
    box-shadow: rgb(50 50 93 / 25%) 0 2px 5px -1px, rgb(0 0 0 / 30%) 0 1px 3px -1px;
    padding: 10px;
    border: 2px solid #ff7729;
    font-size: 15px !important;
}
#flashBox li{
    font-size: 15px !important;
    margin: 20px;
}
.instagram {
    background: linear-gradient(to right bottom, #de497b 0%, #e1164f 100%) !important;
}
.img-youtub{
    object-fit: cover;
    height: 272px;
    width: 100%;
}
.video-play {
    position: absolute;
    top: 28%;
    text-align: center;
    height: 50px;
    left: 0;
    right: 0;
    background: url(<?=$asset?>/media/play1.png);
    background-repeat: no-repeat;
    background-size: contain;
    background-position: 50%;
    transform: scale(1.3);
    text-shadow: 2px 3px 1px #ccc;
}
.video-play:hover {
    transform: scale(1.7);
    -webkit-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
    transition: all 0.5s ease 0s;
}

.box {
    background: #fff;

    margin: 0 0 24px 0;
}

.rte .boxHeadline {
    font-size: 18px;
    font-size: 1.8rem;
    font-weight: 400;
    margin: 0 0 25px 0;
}

.rte .boxHeadline+.boxHeadlineSub {
    margin: -18px 0 30px 0;
}

.rte .boxHeadlineSub {
    font-size: 14px;
    font-size: 1.4rem;
    font-weight: 400;
    font-style: italic;
    color: #919599;
    margin: 0 0 25px 0;
}




.current{
    background: #ff46000a !important;
    color: #ff4600 !important;
    border-radius: 5px !important;
}
.main-menu {
    justify-content: inherit !important;
}
.menu-left ul li a {
    padding: 5px 15px !important;
}
.w-20{
    width: 20% !important;
}
.w-80{
    width: 80% !important;
}
.gallery-two .gallery-item img {
    opacity: 1 !important;
}
.gallery .gallery-item .overlay{
    background-color: rgb(0 0 0 / 31%) !important;
}
.gallery-two.gallery.gallery-uhv .grid-item .gallery-thumb {
    border-radius: 7px;
    border: 2px solid #ff7729;
}
.gallery-two .gallery-item img{
    border-radius: 5px !important;
}
.gal-home{
    object-fit: cover;
    height: 257px;
}
.loader-btn {
    display: inline-block;
    width: 0.9rem;
    height: 0.9rem;
    vertical-align: middle;
    border: 0.2em solid currentColor;
    border-right-color: transparent;
    border-radius: 50%;
    -webkit-animation: spinner-border .75s linear infinite;
    animation: spinner-border .75s linear infinite;
    align-self: center;
}
.text-justify{
    text-align: justify !important;
}

.head-pag{
    margin-top: 74px;
    background: #ff7729;
    height: 100px;
}
.bar{
    height: 25px;
    width: 2px;
    background: #ff7729;
    z-index: 10;
    margin: auto;
}
.carousel-caption{
    bottom: 13rem !important;
}
.h-600{
    height: 600px !important;
}
.btn-transparence-orange {
    background: #ff46003b !important;
    color: #ff4600 !important;
}
.btn-green-transparent{
    background: #00a6504a !important;
    color: #0ba053 !important;
    border: none !important;
}
.btn-green-transparent:hover{
    background: #00a650 !important;
    color: #FFFFFF !important;
    border: none !important;
}
.btn-red-transparent{
    background: #f900243d !important;
    color: #f90024 !important;
    border: none !important;
}
.btn-red-transparent:hover{
    background: #f90024 !important;
    color: #FFFFFF !important;
    border: none !important;
}
.font-sery{
    font-family: 'Archivo', sans-serif !important;
}
.radius-6{
    border-radius: 6px !important;
}
.btn-orange{
    background: #ff5c00 !important;
    color: #FFFFFF !important;
    border: none !important;
}
.btn-orange:hover{
    background: #fff !important;
    color: #ff5c00 !important;
    border: 1px solid #ff5c00 !important;
}
.sidebar form input{
    border-radius: 6px !important;
    border: 2px solid #040404 !important;
}
.pagination li a.active{
    color: #fff !important;
    border: 1px solid #ff5c00 !important;
    background: #ff5c00 !important;
}
.default-button {
    text-transform: initial !important;
}
.blog-page .content>a {
    padding: 7px 35px !important;
}
.comment-form .comment-submit {
    padding: 11px 22px !important;
}
.input-style{
    border: 2px solid #ced4da !important;
    border-radius: 6px !important;
}
h1, h2, h3, h4, h5, h6 {
    font-family: sans-serif  !important;
    text-transform: initial;
    font-weight: inherit;
}
#nt-example2 li{
    font-size: 16px !important;
}

#nt-example2 li {
    background: #ff5c00 !important;
}


#nt-example2-infos .infos-text{
    line-height: 1.4 !important;
}
.text-white{
    color: #fff !important;
}

.position-text{
    transform: translateY(319%) !important;
}

.banner-blog {
    background-image: url(<?=$asset?>/media/sl1.jpg) !important;
    background-position: 50% 50%;
    background-size: cover;
    height: 600px !important;
    position: relative;
    overflow: hidden;
}
.banner{
    height: 600px !important;
}
.bg-white{
    background:#fff !important;
}
.bg-orange{
    background:#ff5c00 !important;
}
header.style-3 div.menu-fixed::after{
    background : #ff460000 !important;
}

header.style-3 div.menu-fixed::before {
    border-bottom: 90px solid #ff460000;
}
.banner-11 .right-content img {
    transform: translateX(1px) !important;
}
.side-image2:before {
    background-image: url(<?=$asset?>/media/right1.png) !important;
}

.side-image2:after {
    background-image: url(<?=$asset?>/media/left1.png) !important;
}
.multi-gallery-section.style2 {
    background-image: url(<?=$asset?>/media/bg.jpg);
}


.menu-button{
    padding: 5px 20px !important;
    text-transform: inherit !important;
}




.ourTeam {
    height:800px;
}



.ourTeam .i {
    margin-top: 30px
}

.ourTeam .i .c {
    background: #fff;
    box-shadow: rgb(0 0 0 / 40%) 0 2px 4px, rgb(0 0 0 / 30%) 0 7px 13px -3px, rgb(0 0 0 / 20%) 0 -3px 0 inset;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    position: relative;
    overflow: hidden;
    padding-bottom: 110px
}

.ourTeam .i .c .wrap {
    position: relative
}

.ourTeam .i .c .wrap img {
    width: 100%;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease
}

.ourTeam .i .c .wrap .info {
    padding: 30px 0;
    position: absolute;
    top: 100%;
    width: 100%;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease
}

.ourTeam .i .c .wrap .info .name {
    margin: 0;
    font-size: 24px;
    font-size: 2.4rem;
    font-weight: 700;
    margin: 0 0 8px 0
}

.ourTeam .i .c .wrap .info .position {
    margin: 0;
    font-size: 14px;
    font-size: 1.4rem;
    color: #555659
}

.ourTeam .i .c .more {
    position: absolute;
    bottom: -100%;
    width: 100%;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease
}

.ourTeam .i .c .more p {
    margin: 0 18px 30px 18px;
    line-height: 22px
}

.ourTeam .i .c .more .socials {
    margin: 0 0 20px 0
}

.ourTeam .i .c .more .socials a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    font-size: 22px;
    font-size: 2.2rem;
    color: #fff;
    margin: 0 0 0 3px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    text-align: center;
    -webkit-box-shadow: 0 3px 0 rgba(0, 0, 0, .1);
    -moz-box-shadow: 0 3px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 3px 0 rgba(0, 0, 0, .1)
}

.ourTeam .i .c .more .socials a:first-child {
    margin: 0
}

.ourTeam .i .c .more .socials a.facebook {
    background: #3262b9
}

.ourTeam .i .c .more .socials a.facebook:hover {
    background: #2d57a5
}

.ourTeam .i .c .more .socials a.twitter {
    background: #3dd7e5
}

.ourTeam .i .c .more .socials a.twitter:hover {
    background: #27d2e2
}

.ourTeam .i .c .more .socials a.google-plus {
    background: #e23535
}

.ourTeam .i .c .more .socials a.google-plus:hover {
    background: #de2020
}

.ourTeam .i .c .more .socials a.linkedin {
    background: #069
}

.ourTeam .i .c .more .socials a.linkedin:hover {
    background: #005580
}

.ourTeam .i .c:hover img {
    -moz-opacity: 0;
    -khtml-opacity: 0;
    -webkit-opacity: 0;
    opacity: 0
}

.ourTeam .i .c:hover .info {
    top: 0
}

.ourTeam .i .c:hover .more {
    bottom: 0
}
.home-title1{
    background: #ff4600;
    padding: 10px 20px;
    line-height:1.5;
}




@media(max-width: 767px) {

    .home-title1{
        font-size: 17px !important;
        padding: 10px 10px  !important;
    }
    .home-title2{
        font-size: 12px !important;
        line-height: 1.2 !important;
    }
    .offset-4, .offset-3 {
        margin-left: 0 !important;
    }

    .padd-home{
        padding: 18px 18px 50px 18px !important;
    }
    .top-home{
        padding-top: 18px !important;
    }
    nav.navbar{
        background:#f8f9fa!important;
    }
    .banner-11 .right-content img {
        transform: translateY(80px) !important;
    }
    .banner {
        height: 296px !important;
    }
    .banner .banner-overlay {
        height: 296px !important;
    }
    .banner-content{
        padding-top: 60px !important;
    }
    .cb-slideshow{
        margin-bottom: 0 !important;
    }

    .h-600{
        height: 215px !important;
    }
    #carouselExampleCaptions{
        margin-top: 73px !important;
    }
    .carousel-caption {
        top: 20px;
        bottom: 0 !important;
    }
    .font-30{
        font-size: 16px !important;
    }
    .font-70{
        font-size: 30px !important;
    }




}



</style>



</head>

<body class="home-fashion">
<header class="style-3">
    <div class="menu-fixed p-0">
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container">
                <a class="navbar-brand" href="<?=$domaine?>"><img src="<?=$asset?>/media/logoAEEK.png" width="50" alt="logo"
                                                                  class="img-responsive"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" style="color: #000;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="main-menu w-70" style="">
                        <div class="menu-left">
                            <ul>
                                <li><a href="<?=$domaine?>" class="<?php if($lien == 'home' || $lien == ''){echo 'current';} ;?>">Accueil</a></li>
<!--                                <li><a href="--><?//=$domaine?><!--/a-propos"  class="--><?php //if($lien == 'a-propos'){echo 'current';} ;?><!--">A propos</a></li>-->
                                <li><a href="<?=$domaine?>/contact"  class="<?php if($lien == 'contact'){echo 'current';} ;?>">Contact</a></li>
                                <li><a href="<?=$domaine?>/blog"  class="<?php if($lien == 'blog'){echo 'current';} ;?>">Actualité</a></li>
                                <li><a href="<?=$domaine?>/events"  class="<?php if($lien == 'events'){echo 'current';} ;?>">Galerie</a></li>
                                <li><a href="https://www.youtube.com/channel/UCDhp_Sepv7QJEmiTdCRAuXg" target="_blank" class="">Aeek tv</a></li>
                                <li><a href="<?=$domaine?>/emplois"  class="<?php if($lien == 'emplois'){echo 'current';} ;?>"> Ofres d'emplois</a></li>
<!--                                <li><a href="--><?//=$domaine?><!--/les-cv"  class="--><?php //if($lien == 'les-cv'){echo 'current';} ;?><!--"> Les CV</a></li>-->

                            </ul>
                        </div>
                    </div>
                    <div class="main-menu w-30">
                        <div class="menu-right">
                            <ul>
                                <?php
                                if(isset($_SESSION['membreaeek'])){
                                    ?>
                                    <li class="li-connect"><a href="<?=$domaine?>/logout">Déconnexion</a></li>
                                    <li><a href="<?=$domaine?>/compte/dashboard" class="menu-button btn-transparence-orange">Mon compte</a></li>
                                <?php
                                }else{
                                  ?>
                                    <li class="li-connect"><a href="<?=$domaine?>/connexion">Connexion</a></li>
                                    <li><a href="<?=$domaine?>/inscription" class="menu-button btn-transparence-orange">Inscription</a></li>
                                <?php
                                }

                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

