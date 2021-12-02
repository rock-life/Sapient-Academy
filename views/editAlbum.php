<?php
$album->GetAlbumById($_GET["id"]);
if(isset($_POST["nameAlbumEdit"]))
{
if(!isset($_POST["isDriveEdit"])||$_POST["isDriveEdit"]==false)
    $isset=false;
else $isset=true;
$p_text=Validate::Validate_data_album($_POST["nameAlbumEdit"],$_POST["costEdit"],$_POST["dateEdit"],$isset,$_POST["ValueDriveEdit"],$_POST["descriptionEdit"]);

if($p_text[5]==""&& $p_text[4]=="" && $p_text[3]=="" && $p_text[2]=="" && $p_text[1]==""){
    $album->EditAlbum($_GET["id"],$_POST["nameAlbumEdit"],$_POST["costEdit"],$_POST["dateEdit"],$isset,$_POST["ValueDriveEdit"],$_SESSION["id"],$_POST["sample_linkEdit"],$_POST["album_linkEdit"],$_POST["poster_linkEdit"],$_POST["descriptionEdit"]);
    header('Location: index.php?action=management_album');  
    }
}
else                                                                                                                                         
$p_text=array("","","","","","","","","","");

?>

<div id="body"><div id="body">
    <div style="display: flex;">
    <h2 id="formCentr">Редагувати альбом</h2>
   </div>
    <hr>

<form id="formCentr" action="" method="post">
    <br>
    <input id="formCentr" placeholder="Назва альбому" name="nameAlbumEdit" value='<?= $album->getName() ?>' type="text">
    <p name="p1" id="formCentrP">
<?= $p_text[1] ?>
</p>  
<br>
    <input id="formCentr" placeholder="Вартість"  name="costEdit"  value='<?php
    echo $album->getPrice();
    ?>'  type="text">
    <p name="p2" id="formCentrP">
<?= $p_text[2] ?>
</p>
    <br>
    <p id="formCentr">Дата випуску</p>
    <input id="formCentr" name="dateEdit"  value='<?= $album->getRelease_date()  ?>' type="date">
    <p name="p3" id="formCentrP">
<?= $p_text[3] ?>
</p>
    <table style="width: 300px; margin: auto">
        <tr style="width: 300px" >
            <td style="width: 200px;">
            <p style="margin-left: 30px">Електронна версія</p>
            </td>
            <td style="width: 50px">
             <input id="formCentr" <?php
    if($album->getE_Album()==1)
    echo "checked" ;
    ?> name="isDriveEdit" type="checkbox">  
            </td>
        </tr>
    </table>

    <input id="formCentr" placeholder="Кількість дисків"  name="ValueDriveEdit" type="number" value='<?php
     if( $album->getPhysical_quantity()!=0)echo $album->getPhysical_quantity();
    ?>'>
    <p name="p5" id="formCentrP">
<?= $p_text[4] ?>
</p>

<br>
<p id="formCentr">Файл альбому</p>
<input id="formCentr" type="file"   name="album_linkEdit" value='<?= $album->getAlbum_link() ?>'>
<p name="p5" id="formCentrP">
<?= $p_text[5] ?>
</p>
    <br>
    <p id="formCentr">Файл тестової версії альбому</p>
<input id="formCentr" type="file"  name="sample_linkEdit" value='<?= $album->getSample_link() ?>'>
<p name="p5" id="formCentrP">
<?= $p_text[6] ?>
</p>
    <br>
    <p id="formCentr">Обкладинка альбому</p>
<input id="formCentr" type="file"  name="poster_linkEdit" value='<?= $album->getPoster_link() ?>'>
<p name="p5" id="formCentrP">
<?= $p_text[7] ?>
</p>
    <br>
    <p id="formCentr">Опис альбому</p>
<textArea id="formCentr" style="height: 50px" name="descriptionEdit"><?= $album->getDescription() ?></textArea>
<p name="p5" id="formCentrP">
<?= $p_text[8] ?>
</p>
    <br>
    <button id="formCentr">Редагувати</button>
    <br>
</form>
<br>
</div>