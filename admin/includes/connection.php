<?php require("constants.php"); ?>
<?php 
    //create
    $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
    if (!$connection){
        die("Database connection failed: ".mysqli_error_list());
    }

    //select db
    $db_select = mysqli_select_db($connection,DB_NAME);
    if (!$db_select){
        die("Database selection failed");
    }
?>