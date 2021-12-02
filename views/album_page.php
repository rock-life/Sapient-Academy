<?php
$album->GetAlbumById($_GET["id"]);
?>
<div id="body">
   <div class="clearfix">
       <div class="album_controls">
           <a class="back_link" href="index.php?action=song"></a>
           
           <h1><?= $album->getName();  ?></h1>
           <div class="clmn_right">
               <?php
                    if($album->getE_album()==1)
                    echo "<a class='buy_mp3' href=''>Придбати в mp3</a>";
                    if($album->getPhysical_quantity()>0)
                    echo "<a class='buy_cd' href=''>Придбати CD</a>";
               ?>
               </div>
       </div>
       <hr>
   <div class="album_songs">
   <div class="clmn_left">
    <img style="width: 419px; height:auto;" src="img/demo.jpg" alt="">
    <p id="formCentr">
        <?= $album->getRelease_date() ?>
    </p>
   </div>
   <div class="clmn_right">
    <p id="description">
       <?= $album->getDescription(); ?>
    </p>
   </div>
   </div>
   </div>
</div>