<?php
 class User{

    static function getNameByID($id){
        $sql="select * from users where :id=id_user";
            $stmp=DBConnect::Connection()->prepare($sql);
            $stmp->bindValue(":id",$id);
            $stmp->execute();  
            while($res=$stmp->fetch())
            return $res["login"];
                 
    }

    static function  register($uname,$usurname, $ulogin, $upass, $uphone, $uemail, $ulang){
         try{
            $sql="select * from users where :log=login";
            $stmp=DBConnect::Connection()->prepare($sql);
            $stmp->bindValue(":log",$_POST["login"]);
            $stmp->execute();   
            if($stmp->rowCount()==0)
            {
             $sql="insert into users(name, surname, login, pass, phone, email, lang, admin,login_attempts) values (:uname,:usurname, :ulogin, :upass, :uphone, :uemail, :ulang, 0, 0)";
            $stmp=DBConnect::Connection()->prepare($sql);
            $stmp->bindValue(":uname", $uname);
            $stmp->bindValue(":usurname",$usurname);
            $stmp->bindValue(":ulogin", $ulogin);
            $stmp->bindValue(":upass",password_hash($upass,PASSWORD_BCRYPT));
            $stmp->bindValue(":uphone", $uphone);
            $stmp->bindValue(":uemail", $uemail);
            $stmp->bindValue(":ulang", $ulang);
            $stmp->execute();
            return "";
        }
            else return "Логін існує!";
         }
         catch(Exception $e){
             echo $e->getMessage();
         }
     }
     static function  sing_in($login, $pass){
        try{
            $v=0;
            $sql="Select * from users where login=:login;";
            $stmp=DBConnect::Connection()->prepare($sql);
            $stmp->bindValue(":login", $login);
            $stmp->execute();
            $res=$stmp->fetch(PDO::FETCH_ASSOC);
            if(!empty($res)){
               if(User::loginAttempt($login, $v)=="")
               ;
               else 
               return User::loginAttempt($login, $v);
                if(password_verify($pass, $res["pass"]))
                {
                    $result=array($res["id_user"],$res["login"], $res["admin"],"");
                    $sql="update users set login_attempts=0 where login=:login";
                    $stmp=DBConnect::Connection()->prepare($sql);
                    $stmp->bindValue(":login", $login);
                    $stmp->execute();
                    return $result;
                }
            }
        }
        catch(Exception $e){
            echo  $e->getMessage();
        }
        if($v<5){
            $v++;
            $sql="update users set login_attempts=".$v." where login=:login";
             $stmp=DBConnect::Connection()->prepare($sql);
             $stmp->bindValue(":login", $login);
            $stmp->execute();
        }
        return array("","","","Невірний логін чи пароль!");
     }
    private static function loginAttempt($login, &$v){
        $sql="select * from users where :log=login";
        $stmp=DBConnect::Connection()->prepare($sql);
        $stmp->bindValue(":log",$login);
        $stmp->execute();
        if($stmp->rowCount()>0)
        {
            foreach($stmp as $row)
            $v=$row["login_attempts"];
        if($v==5) {
            $sql="select last_login_attempt from users where login=:log";
            $stmp=DBConnect::Connection()->prepare($sql);
            $stmp->bindValue(":log",$login);
            $stmp->execute();
            foreach($stmp as $raw)
            $last_date_attempt=$raw["last_login_attempt"];
            $last_date_attempt=strtotime($last_date_attempt);
            $date_diff=($last_date_attempt-time())-3300;

            if($date_diff<=300&&$date_diff>0)
            return array("","","","Перевищена кількість спроб, повторіть через: ".floor($date_diff/60+1)." хв");
            else { 
                $sql="update users set login_attempts=4 where login=:login";
                $stmp=DBConnect::Connection()->prepare($sql);
                $stmp->bindValue(":login", $login);
                $stmp->execute();}

        }
     }
     return "";
    }

 }
?>