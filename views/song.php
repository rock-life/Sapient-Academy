<div id="body">
    <ul class="Album_list">
    <?php
    $albums=Album::getAllAlbumArray();
    foreach($albums as $album){
    ?>
        <li>
            <a class="album" href='index.php?action=album_page&id=<?= $album->getId() ?>'>
                <span class="cover">
                    <img src="img/demo.jpg" class="gs" alt="">
                </span>
                <span class="title">
                    <?php echo $album->getName(); ?>
                </span>
                <?php echo $album->getRelease_date(); ?>
            </a>
        </li>
        <?php } ?>
    </ul>
    <?php
if(isset($_SESSION["admin"])&&$_SESSION["admin"]==1)
    echo ' <div class="Center"> 
                <button class="button">
                    <a class="linkDecorationNone" href="index.php?action=management_album">
                     Керування альбомами
                    </a>
                </button>
            </div>'
    ?>

    <br>
       
</div>
