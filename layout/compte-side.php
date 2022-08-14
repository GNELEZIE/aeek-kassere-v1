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