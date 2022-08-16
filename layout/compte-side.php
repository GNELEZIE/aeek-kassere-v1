<div class="ts-box-comte">
    <img src="<?=$asset?>/media/users/<?php if($data['photo'] != ''){echo $data['photo'];}else{echo 'default.png';}?>" id="img" alt="" style="border-radius: 6px 6px 0 0;"/>
    <div class="btnedit text-center" style="padding-top: 30px;">
        <a href="javascript:void(0);" class="btn-transparence-orange btn-edit" id="btn-img"> <i class="fa fa-edit"></i> Modifier la photo</a>
    </div>
    <div class="tsbox-footer text-center pt-3">
        <h3 class="font-17"><?=html_entity_decode(stripslashes($data['nom'])).' '.html_entity_decode(stripslashes($data['prenom']));?></h3>
        <small><?=html_entity_decode(stripslashes($data['email']));?></small>
    </div>
</div>