<?php
class Validate{
    public static function Validate_data_reg($name,$sn,$log,$pass,$ompass,$ph,$email,$listl){
        if(isset($name)&& $name=="")
            {$error_text["name_error"]= "Введіть ім'я" ;}
        else if(isset($name)&&preg_match("#^[aA-zZ]{3,}$|^[аА-яЯІіЇїЄєҐґ]{3,}$#u",$name)==false)
        {
           $error_text["name_error"]= "Введіть ім'я коректно";
        }
        else   
            {$error_text["name_error"]= "";}
        if(isset($sn)&& $sn=="")
            {$error_text["surname_error"]= "Введіть прізвище" ;}
        elseif(isset($sn)&&preg_match("#^[aA-zZ]{3,}$|^[аА-яЯІіЇїЄєҐґ]{3,}$#u",$sn)==false)
            {$error_text["surname_error"]= "Введіть прізвище коректно";}
        else 
            {$error_text["surname_error"]= ""; };
        if(isset($log)&& $log=="")
            {$error_text["login_error"]= "Введіть логін" ;}
        elseif(isset($log)&&preg_match("#^[aA-zZ\-\_0-9]{4,}$|^[аА-яЯІіЇїЄєҐґ\-\_0-9]{4,}$#u",$log)==false)
            {$error_text["login_error"]= "Введіть логін коректно";}
        else 
            $error_text["login_error"]= "";
        if(isset($pass)&& $pass=="")
            { $error_text["pass_error"]= "Введіть пароль" ;}
        elseif(isset($pass)&&preg_match("#^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z\d]{8,}#u",$pass)==false)
            {$error_text["pass_error"]= "Введіть пароль коректно";}
        else
            $error_text["pass_error"]= "";
        if(isset($ompass)&& $ompass=="")
            { $error_text["ompass_error"]= "Повторіть пароль" ;}
        elseif(isset($ompass)&&preg_match("#^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]){7,}#u",$ompass)==false&&$ompass!=$pass)
            {$error_text["ompass_error"]= "Введіть пароль коректно";}
        else 
            $error_text["ompass_error"]= "";
        if(isset($ph)&& $ph=="")
            {$error_text["telephone_error"]= "Введіть номер телефону" ;}
        elseif(isset($ph)&&preg_match("#^\d{9}|\+38\(0+[0-9]{2}+\)\-[0-9]{3}+\-+[0-9]{2}+\-+[0-9]{2}$#u",$ph)==false)
            {$error_text["telephone_error"]= "Введіть номер телефону коректно";}
        else
            { $error_text["telephone_error"]= "";}
        if(isset($email)&& $email=="")
            {$error_text["e-mail_error"]=  "Введіть електронну пошту" ;}
        elseif(isset($email)&&preg_match("#^[a-zA-Z0-9\.\-_]{2,}+@+[a-zA-Z0-9\-_]+\.+[a-z]{2,3}$#u",$email)==false)
            {$error_text["e-mail_error"]=  "Введіть електронну пошту коректно";}
        else 
            {$error_text["e-mail_error"]=  "";}
        if(isset($listl)&&$listl=="оберіть мову")
            {$error_text["Lang_error"]=  "Оберіть мову!" ; }
        elseif(isset($listl)&&preg_match("#^[a-z]{2}$#u",$listl)==false)
            {$error_text["Lang_error"]=  "Оберіть мову!"; }
        else 
            {$error_text["Lang_error"]=  ""; }
    return $error_text;
    }

    public static function Validate_data_album($name,$cost,$date,$physical_quantity,$description)
    {
        if(isset($name)&& $name=="")
            {$error_text["name_error"]= "Введіть назву альбому" ;}
        else if(isset($name)&&preg_match("#^.{1,}$#u",$name)==false)
        {
            $error_text["name_error"]= "Введіть назву коректно";
        }
        else 
            {$error_text["name_error"]= "";}

        if(isset($cost)&& $cost=="")
            {$error_text["cost_error"]= "Введіть вартість" ;}
        elseif(isset($cost)&&preg_match("#^[0-9]{1,10}$#u",$cost)==false)
            {$error_text["cost_error"]= "Введіть вартість коректно";}
        else 
            {$error_text["cost_error"]= ""; };
    
        if(isset($date)&& $date=="")
            {$error_text["date_error"]= "Введіть дату" ;}
        else 
            $error_text["date_error"]= "";

        if(isset($physical_quantity)&&preg_match("#^[0-9]{1,10}$#u",$physical_quantity)==false)
            {$error_text["amount_error"]= "Введіть кількість коректно";}
        else 
            $error_text["amount_error"]= "";
    
        if(isset($description)&&$description=="")
            $error_text["description_error"]= "Введіть опис альбому";
        else if(isset($description)&&preg_match("#^.{10,}$#u",$description)==false)
            $error_text["description_error"]= "Введіть опис коректно";
        else 
            $error_text["description_error"]= "";

    return $error_text;
    
    }
}
?>