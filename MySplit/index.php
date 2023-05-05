<?php
    session_start();
    if(isset($_SESSION["counter"])){
        
        if($_SESSION["counter"]>=5){
            
            unset($_SESSION["username"]);
            session_destroy();
        }
        else{
            $_SESSION["counter" ] = $_SESSION["counter"]+1;
        }
    }

    $pw="htl";
    $logIn="bra";
    if(isset($_GET["go"]) && isset($_GET["user"]) && !empty($_GET["user"])){
        if($_GET["user"]==$logIn && $_GET["pw"]==$pw){
            $_SESSION["username"]=$_GET["user"];
            $_SESSION["geheim"]=true;
            require_once('header.php');
            header("Location: geheim.php");
        }
        else{
            if(isset($_SESSION["username"])){
                $logIn=$_SESSION["username"];
                $_SESSION["geheim"]=false;
                require_once('../inc/header.php');
                header("Location: geheim.php");
            }
            else{
                $logIn="wonder";
            }
        }

    }
?>


    
    <form method="post" action=<?php echo htmlentities($_SERVER['PHP_SELF'])?>>
        <input type="text" id="username" name="user" placeholder="Username" required value=<?php echo htmlentities($logIn); ?>> 
        <input type="password" name="passw" value="" placeholder="Passowrt" required>
        <input type="submit" value="Login">



    </form>


    
    