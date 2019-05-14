<?php require_once("session.php"); ?>
<?php require("functions.php"); ?>
<?php
if(isset($_POST['submit'])){
    $username = "";

    $un= mysql_prep(trim($_POST["username"]));
    $pw= mysql_prep(trim($_POST["password"]));
    $hpw= md5($pw);

    $query = "SELECT * FROM admin WHERE (username = '{$un}') AND password = '{$hpw}' LIMIT 1";
    $result= mysqli_query($connection,$query);

    confirm_query($result);
    
    if (!$result){
        die("Database connection failed");
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
        $_SESSION['start'] = time(); // Taking now logged in time.
        // Ending a session in 30 minutes from the starting time.
        $_SESSION['expire'] = $_SESSION['start'] + (30*60);
        echo "<meta http-equiv='refresh' content='0;url=../dashboard/'>";
    }else{
        //Failed
        echo "<meta http-equiv='refresh' content='0;url=../'>";
    }
}else{
    //return;
    echo "<meta http-equiv='refresh' content='0;url=../'>";
}

?>

<?php require_once("../includes/close_connection.php");?>
