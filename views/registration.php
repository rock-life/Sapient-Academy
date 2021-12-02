
<?php

//     перевірка коректності введених даних
if(isset($_POST["name"]))
$p_text=Validate::Validate_data_reg($_POST["name"],$_POST["surname"],$_POST["login"],$_POST["password"],$_POST["password_one_more"],$_POST["phone"],$_POST["email"],$_POST["listLang"],);
else
$p_text=array("","","","","","","","","");
?>

<div id="body">
    <div style="display: flex;">
    <h2 id="formCentr">Реєстрація</h2>
   </div>
    <hr>
    <?php // висновок перевірки
    if(!isset($_POST["name"])||$p_text[1]!=""||$p_text[2]!=""||$p_text[3]!=""||$p_text[4]!=""||$p_text[5]!=""|$p_text[6]!=""||$p_text[7]!=""||$p_text[8]!="") {
        ?>

    <form id="formCentr" action="index.php?action=registration" method="post">
    
    <input id="formCentr" placeholder="Ім'я"  name="name" type="text">
 
<p name="p1" id="formCentrP">
<?php
    echo $p_text[1];
?>
</p>  
<br>
    <input id="formCentr" placeholder="Прізвище"  name="surname" type="text">
    <p name="p2" id="formCentrP">
<?php
    echo $p_text[2];
?>
</p>
    <br>
    <input id="formCentr" placeholder="Логін"  name="login" type="text">
    <p name="p3" id="formCentrP">
<?php
    echo $p_text[3];
?>
</p>
    <br>
    <input id="formCentr" placeholder="Пароль"  name="password" type="password">
    <p name="p4" id="formCentrP">
<?php
   echo $p_text[4];
?>
</p>
    <br>

    <input id="formCentr" placeholder="Повторіть пароль"  name="password_one_more" type="password">
    <p name="p5" id="formCentrP">
<?php
   echo $p_text[5]; 
?>
</p>
    <br>

    <input id="formCentr" placeholder="Телефон (+38(0xx)-xxx-xx-xx)"  name="phone" type="phone">
    <p name="p6" id="formCentrP">
<?php
    echo $p_text[6];
?>
</p>
    <br>

    <input id="formCentr" placeholder="Електронна пошта"  name="email" type="email">
    <p name="p7" id="formCentrP">
<?php
echo $p_text[7];
?>
</p>
    <br>
    <select name="listLang" id="formCentr">
        <option value="">оберіть мову</option>
        <?php
           $a=file_get_contents("array.json");
           $array=json_decode($a,true);
           for ($i=0; $i < 185; $i++) { 
               echo $array[$i];
           }
         ?>
    </select>
    <p name="p8" id="formCentrP">
<?php
echo $p_text[8];
?>
</p>
    <hr>
    <button id="formCentr">Зареєструватися</button>
    <hr>
    </form>
   
    <?php } else if(strcmp(User::register($_POST["name"],$_POST["surname"], $_POST["login"], $_POST["password"], $_POST["phone"], $_POST["email"], $_POST["listLang"]),"")==0) {
        ?>
        <h2 >Реєстрація успішна!</h2>
        <br>
        <a id="CenterLink" href="index.php?action=main"> На головну</a>
        <hr>
        <?php  }
        else { 
        ?>
        <p  id="CenterLink">
        <?php
        echo "Логін існує!";
        ?>
        </p>
        <a id="CenterLink" href="index.php?action=registration">Спробувати ще раз</a>
        <?php  }
        ?>
    </div>