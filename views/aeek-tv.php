<?php
$apiKey = "AIzaSyAnA2MWSdiQA-4u9LAJfMxRZKwoJbEIAUA";
$chainId = "UCDhp_Sepv7QJEmiTdCRAuXg";
$maxResults = 6;

//'part=snippet&channelId=UCDhp_Sepv7QJEmiTdCRAuXg&maxResults=20&order=date&videoCaption=videoCaptionUnspecified&key=[YOUR_API_KEY]' \


$baseUrl = "https://youtube.googleapis.com/youtube/v3/search";
//$url =  $baseUrl?part=channelId=".$chainId."&maxResults=".$maxResults."&order=date&key=".$apiKey.";
//$url = "$baseUrl?part=snippet&channelId".$chainId."&maxResults=".$maxResults."&order=date&key=".$apiKey."";
$url = "https://youtube.googleapis.com/youtube/v3/search?part=snippet&channelId=UCDhp_Sepv7QJEmiTdCRAuXg&maxResults=20&order=date&key=AIzaSyAnA2MWSdiQA-4u9LAJfMxRZKwoJbEIAUA";

$result = json_decode(getDataByUrl($url),true);
//print_r($url);
//exit;
//$url = file_get_contents($url);
//$videoList = json_decode($url);
//foreach($result['items'] as $item) {
//    print_r($item['snippet']['thumbnails']['medium']['url']) ;
//    exit;
//}


require_once 'layout/header.php';
?>

<section class="container-fluid head-pag" style="margin-top: 75px">
    <div class="container text-center" style="padding-top: 29px;">
        <h1>
            La web tv de l'AEEK
        </h1>
    </div>
</section>

<section class="venue-section padding-120" style=" background:#eee;">
    <div class="container">
        <div class="section-header text-center">
            <h3>Enjoy Your Stay</h3>
            <p><em>Quickly harness dynamic thinking through value added models.</em></p>
        </div>

        <div class="section-wrapper">

            <div class="container row">
                <?php
                foreach($result['items'] as $item) {
                ?>
                <div class="col-md-4">
                    <div class="box rte" style="position: relative">
                        <a href="https://www.youtube.com/watch?v=<?=$item['id']['videoId']?>" data-lity>
                            <img src="<?=$item['snippet']['thumbnails']['medium']['url']?>" class="img-youtub" alt="venue">

                            <div class="video-play"></div>
<!--                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/ESXgJ9-H-2U" frameborder="0" allowfullscreen=""></iframe>-->
                        <div class="inf p-3">
                            <h2 class="boxHeadline" style="line-height: 1.5; font-size: 18px;"><?=$item['snippet']['title']?></h2>
                            <h3 class="boxHeadlineSub" style="line-height: 1.3; font-size: 16px;"><?=$item['snippet']['description']?></h3>
                        </div>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>




            <div class="venue-list">
<!--                <div class="row">-->
<!--                    --><?php
//                    foreach($result['items'] as $item) {
//                        ?>
<!--                        <div class="col-lg-4 col-md-6">-->
<!--                            <div class="venue-item">-->
<!--                                <div class="venue-thumb">-->
<!--                                    <img src="--><?//=$item['snippet']['thumbnails']['medium']['url']?><!--" alt="venue">-->
<!--                                </div>-->
<!--                                <div class="venue-content">-->
<!--                                    <h4>--><?//=$item['snippet']['title']?><!--</h4>-->
<!---->
<!--                                    <p><span>Room Rate: </span>$150/per day</p>-->
<!---->
<!--                                    <p><span>Distance from Venue: </span>0.50 KM</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php
//                    }
//                    ?>
<!---->
<!--                </div>-->
            </div>
        </div>
    </div>
</section>

<?php
require_once 'layout/footer.php';
?>


