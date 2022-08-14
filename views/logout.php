<?php
if(isset($_COOKIE['cookieaeek'])) {
    setcookie('cookieaeek',null,time()-60*60*24*30,'/',$cookies_domaine,true,true);
}
unset($_SESSION['membreaeek']);
header('location:'.$domaine);
exit();