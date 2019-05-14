<?php 
    require("connection.php");
    
    $u = "";
    $user = "";
    
    if (isset($_SESSION['username'])) {
        # code...
        $u = $_SESSION['username'];
    }
    
    $get_user = $connection->query("SELECT * FROM `admin` WHERE (username = '{$u}')");
    if ($get_user->num_rows == 1) {
        # code...
        $get = $get_user->fetch_assoc();
        $id = $get['id'];
        $user = $get['username'];
    }
 ?>