<?php require_once("connection.php"); ?>
<?php
    $un= trim($_POST["username"]);
    $em= trim($_POST["email"]);
    $pn= trim($_POST["phoneNumber"]);
    $pw= trim($_POST["password"]);
    $cpw= trim($_POST["confirmPassword"]);
    $rf= trim($_POST["register"]);
    $disbn = trim($_POST['bankname']);
    $disno = trim($_POST['accntno']);
    $disat = trim($_POST['accnttype']);
    $disan = trim($_POST['accntname']);
    $fee = 0;

    // Avoids duplicate username in the DB
    $result= mysqli_query($connection,"SELECT * FROM user_details");
    while ($db=mysqli_fetch_row($result)){
        if ($un == $db[1] || $em == $db[3]){
            header('Location: ../signup/index.php?u_e_exists=1');
            exit();
        }
    }

    // Makes sure the password fields are equal
    if ($pw == $cpw){
        //Success
        $query = "SELECT username FROM user_details WHERE (ID = '{$rf}')";
        $result= mysqli_query($connection,$query);
        if (!$result){
            die("Database connection failed");
        }

        while ($db=mysqli_fetch_row($result)){
            $disrefname = $db[0];
        }

        $hpw = md5($pw); // MD5 Hashing technique
        $query = "INSERT INTO user_details
        (username, password, email, phone_no, refeerer, bankname, accntno, accnttype, accntname, fee) 
        VALUES ('{$un}','{$hpw}','{$em}','{$pn}','{$disrefname}','{$disbn}', '{$disno}','{$disat}','{$disan}','{$fee}')";
        
        $result = mysqli_query($connection,$query);
        if(!$result){
            header('Location: ../signup/index.php?dberror=1');
            exit();
        }else{
            header('Location: ../login/index.php?success=1');
            exit();
        }
    } else{
        //Failed
        header('Location: ../signup/index.php?mismatch=1');
        exit();
    }
?>
<?php require_once("../includes/close_connection.php");?>
