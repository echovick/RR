<?php require_once("session.php"); ?>
<?php require_once("connection.php"); ?>
<?php
    $username = "";

    $un= trim($_POST["username"]);
    $pw= trim($_POST["password"]);
    $hpw= md5($pw);
    
    $query = "SELECT * FROM user_details WHERE (username = '{$un}' OR email = '{$un}') AND password = '{$hpw}' LIMIT 1";
    $result = mysqli_query($connection,$query);
    if (!$result){
        die("Database connection failed ");
    }

    //Grabs ID of user to use for session
    while ($db=mysqli_fetch_row($result)){
        $user_id = $db[0];
        $username = $db[1];
    }

    $_SESSION['id'] = $user_id;
    $_SESSION['username'] = $username;
    // for the login
    if (mysqli_num_rows($result) == 1){
        header('Location: ../dashboard/');
        exit();
    }else{
        //Failed
        header('Location: ../login/index.php?wrongpass=1');
    }
?>
<?php require_once("../includes/close_connection.php");?>
