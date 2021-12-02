<?php

?>
<div  id="body">
    <div class="inlineDiv" >
    <h2 style="margin-right: 20px;" >Керування альбомами</h2>
    <button class="button" ><a class="linkDecorationNone" href="index.php?action=addAlbum">Додати альбом</a></button>
   </div>
    <hr>

<?php
$albums=Album::getAllAlbumArray();
$v=0;

echo " <form  method='post'><table style='width: 100%; border-color: tomato;' border='3px' >
<tr>
<td >id</td>
<td >Назва альбому</td>
<td  >Ціна</td>
<td  >Дата випуску</td>
<td  >Цифрова версія</td>
<td  >Кількість дисків</td>
<td  >Додав користувач...</td>
<td  >Уривок</td>
<td  >Альбом</td>
<td  >Обкладинка</td>
<td  >Опис</td>
</tr>";
foreach($albums as $album)
{
    $name= User::getNameByID($album->getId_user());
    if($album->getE_Album()==0)
    $is="ні";
    else $is="так";
    echo "<tr>
    <td>".$album->getId()."</td>
    <td>".$album->getName()."</td>
    <td>".$album->getPrice()."</td>
    <td>".$album->getRelease_date()."</td>
    <td>".$is."</td>
    <td>".$album->getPhysical_quantity()."</td>
    <td>".$name."</td>
    <td>".$album->getSample_link()."</td>
    <td>".$album->getAlbum_link()."</td>
    <td>".$album->getPoster_link()."</td>
    <td>".mb_strimwidth($album->getDescription(),0,20,"...")."</td>
    <td><a href='index.php?action=editAlbum&id={$album->getId()}'><img id='icon' src='img/edit_icon.png' ></a></td>
    <td><a href='index.php?action=deleteAlbum&id={$album->getId()}'><img id='icon' src='img/delete_icon.png' ></a></td>
    </tr>";
    
}

echo "</table></form>";
?>
</div>