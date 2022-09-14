<?php
    require_once("Connection.php");

    if(!session_start()){
        echo "sessione non avviata";
    }else{
        if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
            header("location :Login.html");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- css per la top bar-->
    <style>
        /* Navbar container */
        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial;
        }

        /* Links inside the navbar */
        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* The dropdown container */
        .dropdown {
            float: left;
            overflow: hidden;
        }

        /* Dropdown button */
        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit; /* Important for vertical align on mobile phones */
            margin: 0; /* Important for vertical align on mobile phones */
        }

        /* Add a red background color to navbar links on hover */
        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: red;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        /* Add a grey background color to dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        } 
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <div class="navbar">
        <a >Home</a>
        <a href="TaskList.php">Task List</a>
        <div class="dropdown">
            <button class="dropbtn">
                <?php 
                    if(empty($_COOKIE["uname"])){?>
                    Guest
                    <div class="dropdown-content">
                        <a href="Login.html">Login</a>
                        <a href="Register.html">Registrati</a>
                    </div>
                <?php }else{
                        echo $_COOKIE["uname"];?>   
                        <div class="dropdown-content">
                            <a href="Login.html">Login</a>
                            <a href="Logout.php">Logout</a>
                        </div>
                <?php }?>
            </button>
        </div>
    </div> 
    <div>
        <form method="post" action="AddTask.php">
            <label>Aggiungi una task</label><br>
                <input type="text" id="task" name="task">
                <input type="hidden" id="uname" name="uname" value=<?php echo $_COOKIE["uname"];?>>
            <button type="submit" >Aggiungi</button>
        </form>
    </div>
    <?php
         $query = "SELECT * FROM Task";
         $result = $connessione->query($query);

         if($result->num_rows === 0){
            echo "Non ci sono task nel database,aggiungi la prima!";
         }else{?>
                <table>
                    <tr>
                        <th>Task</th>
                        <th>Stato</th>
                    </tr>
                    <?php
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                            if($row["completed"] == 0){
                                echo "<tr>
                                        <td>".$row["task"]."</td>".
                                        "<td>Non completata</td>
                                     </tr>";
                            }else{
                                echo "<tr>
                                        <td>".$row["task"]."</td>".
                                        "<td>Completata</td>
                                      </tr>";
                            }
                        }
                    ?>
                </table>
    <?php } ?>
</body>
</html>