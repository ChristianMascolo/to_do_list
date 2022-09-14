<?php 

require_once("Connection.php");

$uname = $connessione->real_escape_string($_POST['uname']);
$pwd = $connessione->real_escape_string($_POST['pwd']);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql_select = "SELECT * FROM User WHERE uname= '$uname'";

    if($result = $connessione->query($sql_select)){
        if($result->num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if($pwd === $row['pwd']){
                session_start();
                $_SESSION['logged'] = true;
                setcookie("uname",$row['uname']);
                header("location: AreaPersonale.php");
            }else{
                echo "La password non è corretta";
                echo "\n pwd nel db: ".$row['pwd'];
                echo "\n pwd mandata : " .$pwd;
                echo "\n pwd mandata e hashata: " . password_hash($password , PASSWORD_DEFAULT);
            }
        }else{
            echo "Non ci sono account registrati con quell'username";
        }
    }else{
        echo "Errore in fase di login";
    }
}


$connessione->close();

?>