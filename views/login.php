<?php
$p_text=array("","",0,"");
if(isset($_POST["Slogin"])){
if($_POST["Slogin"]=="")
$p_text[0]="Введіть логін!";
else {
    $p_text[2]=$p_text[2]+1;
}
if($_POST["Spassword"]=="")
$p_text[1]="Введіть пароль!";
else {
    $p_text[2]=$p_text[2]+1;
}
if($p_text[2]==2)
{
$res=User::sing_in($_POST["Slogin"],$_POST["Spassword"]);
if($res[3]==""){
$_SESSION["id"]=$res[0];
$_SESSION["login"]=$res[1];
$_SESSION["admin"]=$res[2];
header('Location: index.php?action=main');
}
else 
$p_text[3]=$res[3];
}
}
?>

<div id="body">
<h1 >Авторизація</h1>
<h3 style="text-align: center; color: red;">
<?php
echo $p_text[3]
?>
</h3>
<hr>
<br>
<form  id="formCentr" action="index.php?action=login" method="post">
    <input id="formCentr" placeholder="Логін"  name="Slogin" type="text">
    <p name="p3" id="formCentrP">
<?php
    echo $p_text[0];
?>
</p>
    <br>
    <input id="formCentr" placeholder="Пароль"  name="Spassword" type="password">
    <p name="p4" id="formCentrP">
<?php
   echo $p_text[1];
?>
</p>
    <br>
    <button id="formCentr">Вхід</button>
    </form>
</div>
