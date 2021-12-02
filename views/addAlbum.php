<?php

if(!isset($_POST["isDrive"])||$_POST["isDrive"]==false)
    $isset=false;
else $isset=true;

if(isset($_POST["nameAlbum"])){
    $error_text=Validate::Validate_data_album($_POST["nameAlbum"],$_POST["cost"],$_POST["date"],$_POST["ValueDrive"],$_POST["description"]);
    if( $error_text["name_error"]=="" && $error_text["cost_error"]=="" && $error_text["date_error"]=="" && $error_text["amount_error"]==""&& $error_text["description_error"]=="")
        $album->AddAlbum($_POST["nameAlbum"],$_POST["cost"],$_POST["date"],$isset,$_POST["ValueDrive"],$_SESSION["id"],$_POST["sample_link"],$_POST["album_link"],$_POST["poster_link"],$_POST["description"]);
}
?>
<div  id="body">
    <div style="display: flex;">
    <h2 id="formCentr">Новий альбом</h2>
   </div>
    <hr>

<form id="formCentr" action="" method="post">
    <br>
    <input id="formCentr" placeholder="Назва альбому" name="nameAlbum" type="text">
    <p name="p1" id="formCentrP">
<?php 
    if(isset($error_text["name_error"]))
        echo $error_text["name_error"] ;
  ?>
</p>  
<br>
    <input id="formCentr" placeholder="Вартість"  name="cost" type="text">
    <p name="p2" id="formCentrP">
<?php 
    if(isset($error_text["name_error"]))
        echo $error_text["cost_error"] ?>
</p>
    <br>
    <p id="formCentr">Дата випуску</p>
    <input id="formCentr" name="date" type="date">
    <p name="p3" id="formCentrP">
<?php 
    if(isset($error_text["name_error"]))
        echo  $error_text["date_error"] ?>
</p>
    <table style="width: 60%; margin: auto">
        <tr  >
            <td style="width: 200px;">
            <p style="margin-left: 30px">Електронна версія </p>
            </td>
            <td style="width: 50px">
             <input id="formCentr"  name="isDrive" type="checkbox">  
            </td>
        </tr>
    </table>

    <input id="formCentr" placeholder="Кількість дисків"  name="ValueDrive" type="number">
    <p name="p5" id="formCentrP">
<?php 
    if(isset($error_text["name_error"]))
        echo $error_text["amount_error"] ?>
</p>

<br>
<p id="formCentr">Файл альбому</p>
<input id="formCentr" type="file"  name="album_link">
<p name="p5" id="formCentrP">
</p>
    <br>
    <p id="formCentr">Файл тестової версії альбому</p>
<input id="formCentr" type="file"  name="sample_link">
<p name="p5" id="formCentrP">
</p>
    <br>
    <p id="formCentr">Обкладинка альбому</p>
<input id="formCentr" type="file"  name="poster_link">
<p name="p5" id="formCentrP">
</p>
    <br>
    <p id="formCentr">Опис альбому</p>
<textArea id="formCentr" style="height: 100px" name="description"></textArea>
<p name="p5" id="formCentrP">
    <?php 
    if(isset($error_text["name_error"]))
        echo$error_text["description_error"]; ?> 
</p>
    <br>
    <button id="formCentr">Створити</button>
    <br>
</form>
<br>
</div>