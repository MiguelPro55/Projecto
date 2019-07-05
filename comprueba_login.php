<?php

    try{

        $base=new PDO("mysql:host=localhost; dbname=lavanderia", "root","");
        $base->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM USUARIOS WHERE usuario= :user AND clave= :pass";
        $resultado=$base->prepare($sql);
        $login=htmlentities(addslashes($_POST["user"]));
        $password=htmlentities(addslashes($_POST["pass"]));
        $resultado->bindValue(":user",$login);
        $resultado->bindValue(":pass",$password);
        $resultado->execute();
        $numero_registro=$resultado->rowCount();
        if($numero_registro!=0){
            session_start();
            $_SESSION["usuario"]=$_POST["user"];
            header("location:index.php");

        }else{
            header("location:login.php");
        }


    }catch(Exception $e){

        die("Error: ". $e->getMessage());

    }



?>