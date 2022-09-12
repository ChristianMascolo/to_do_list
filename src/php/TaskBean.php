<?php
class TaskBean{
    private $selectCompleted = "SELECT * FROM Task AS t WHERE t.completed=true";
    private $selectUncompleted = "SELECT * FROM Task AS t WHERE t.completed=false";
    private $deleteQuery = "DELETE FROM Task AS t WHERE t.task=?";
    private $insertQuery = "INSERT INTO Task(task,completed,uname) VALUES(?,?,?)";

    function getCompleted(){
        $mysqli = new mysqli("localhost","php","password","ToDoList","3306");
        $result = $mysqli->query($this->selectCompleted);
 
        if($result->num_rows>0){
            return $result->fetch_array();
        }else{
            echo "Non sono presenti task completate";
        }

        $mysqli->close();
    }

    function getUncompleted(){
        $mysqli = new mysqli("localhost","php","password","ToDoList","3306");
        $result = $mysqli->query($this->selectUncompleted);
 
        if($result->num_rows>0){
            return $result->fetch_array();
        }else{
            echo "Non sono presenti task non completate";
        }

        $mysqli->close();
    }

    function deleteTask($task){
        $mysqli = new mysqli("localhost","php","password","ToDoList","3306");
        $result = $mysqli->prepare($this->deleteQuery);

        if($result){
            $result->bind_param("s",$task);
            $result->execute();
        }
        $mysqli->close();
    }

    function addTask($task,$uname){
        $mysqli = new mysqli("localhost","php","password","ToDoList","3306");
        $result = $mysqli->prepare($this->insertQuery);
        
        if($result){
            $result->bind_param("sbs",$task,false,$uname);
            $result->execute();
        }

        $mysqli->close();
    }

}

$tb = new TaskBean();

//check if there is a logged user
if(!empty($_SESSION['user'])){
    if(isset($_POST['task']) || isset($_GET['task'])){
        switch($_POST['action']){
            case "add":{
                $task = $_POST['task'];
                $uname = $_SESSION['user']->uname;

                $tb->addTask($task,$uname);
            };break;

            case "remove":{
                $task = $_POST['task'];

                $tb->deleteTask($task);
            };break;
            
            case "completed":{
                $task = $_POST['task'];
            };break;
            
            case "uncompleted":{
                $task = $_POST['task'];
            };break;
        }
    }
}
