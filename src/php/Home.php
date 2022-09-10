<?php
    $username="";
    $numeri_incompleti="";
    $media_voti="";
    $voto_maggiore="";
    $mysqli=mysqli("localhost","php","password","ToDoList");

    //check error connection
    if($mysqli->connect_errno){
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
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

    </head>
<body>
    <div class="navbar">
        <a >Home</a>
        <a href="TaskList.php">Task List</a>
        <div class="dropdown">
            <button class="dropbtn">Area Personale
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Area Personale</a>
                <a href="#">Login</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </div> 
    
</body>
</html> 