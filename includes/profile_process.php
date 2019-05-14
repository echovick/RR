<?php require_once("session.php"); ?>
<?php require_once("connection.php"); ?>
<?php 

    //Declaration of Global vriables
    //--------------------------------
    $disbn = "";
    $disan = "";
    $disat = "";
    $disan = "";
    $disid = "";
    $disun = "";
    $disem = "";
    $paid = "";
    $payer = "";
    $recieved = "";
    $reciever = "";
    $disphone = "";
    $useridoutput = "";
    $useranoutput ="";
    $useratoutput ="";
    $userbnoutput ="";
    $userphoneoutput ="";
    // ----------------------------

    $sessionkey = $_SESSION['username'];

    //Bank Details process
    if(isset($_POST['updateaccnt'])){
        $disbn = $_POST['bankname'];
        $disno = $_POST['accntno'];
        $disat = $_POST['accnttype'];
        $disan = $_POST['accntname'];
        
        $query = "UPDATE user_details set bankname='{$disbn}', accntno='{$disno}', accnttype='{$disat}', accntname='{$disan}' WHERE (username = '{$sessionkey}')";
        $result = mysqli_query($connection,$query);
        if(!$result){
            header("location: ../dashboard/bank.php?update_nosuccess=1");
        }else{
            header("location: ../dashboard/bank.php?update_success=1");
        }
    }
    
    //Code to Select Bank Details
    $query = "SELECT * FROM user_details WHERE (username = '{$sessionkey}')";
    $result= mysqli_query($connection,$query);
    if (!$result){
        die("Database connection failed".mysqli_error_list($result));
    }
    
    while ($row=mysqli_fetch_row($result)){
        $disno = $row[7];
        $disbn = $row[6];
        $disan = $row[9];
        $disat = $row[8];
    }

    // 1. Code to grab users info for display in profile
    $query = "SELECT ID, username, email, phone_no FROM user_details WHERE (username = '{$sessionkey}')";
    $result= mysqli_query($connection,$query);
    if (!$result){
        die("Database connection failed");
    }

    while ($db=mysqli_fetch_row($result)){
        $disid = $db[0];
        $disun = $db[1];
        $disem = $db[2];
        $disphone = $db[3];
    }                   
    
    //Code to comfirm Payment with transaction ID [Uncompleted]
    if (isset($_POST['confirmtransac'])){
        $transacchk = trim($_POST['confirmid']);
        $con = 'confirmed';
        $recieved = 1;
        $paid = 1;
        
        $query = "SELECT recipient FROM transac WHERE (transacID = '{$transacchk}') LIMIT 1";
        $result= mysqli_query($connection,$query);
        if (!$result){
            die("Database connection failed");
        }else{
            while ($db=mysqli_fetch_row($result)){
                $rcpt = $db[0];
            }
        }

        $query = "SELECT payer FROM transac WHERE (transacID = '{$transacchk}') LIMIT 1";
        $result= mysqli_query($connection,$query);
        if (!$result){
            die("Database connection failed");
        }else{
            while ($db=mysqli_fetch_row($result)){
                $payer = $db[0];
            }
        }

        if ($rcpt == $sessionkey) {

            $query = "SELECT status FROM transac WHERE (transacID = '{$transacchk}') LIMIT 1";
            $result= mysqli_query($connection,$query);
            if (!$result){
                die("Database connection failed");
            }

            if (mysqli_num_rows($result) == 1){
                $query = "UPDATE transac set status = '{$con}' where (transacID = '{$transacchk}')";
                $query1 = "UPDATE payers set paid = '{$paid}' where (username = '{$payer}')";
                $query2 = "UPDATE payers set recieved = '{$recieved}' where (username = '{$rcpt}')";
                $query3 = "DELETE FROM payers WHERE (paid = '{$paid}') AND (recieved = '{$recieved}')";

                $result=mysqli_query($connection,$query);
                $result1=mysqli_query($connection,$query1);
                $result2=mysqli_query($connection,$query2);
                if(!$result){
                    die("Database connection failed");
                }else{
                    $_SESSION['transacID'] = $transacchk;
                    $_SESSION['user'] = $sessionkey;
                    header('Location: ../dashboard/index.php?confirm_success=1');
                }
                exit;
            }
        }else{
            $_SESSION['transacID'] = $transacchk;
            $_SESSION['user'] = $sessionkey;
            header('Location: ../dashboard/index.php?confirm_nosuccess=1');
        }
    }

    //Code to request payment
    if (isset($_POST['requestpay'])) {
        $pamt = trim($_POST['amt']);
        $paid = "0";
        $recieved = "0";
        
        if ($pamt == "12000" || $pamt == "24000"){
            //Code to execute if condition is true
            $query = "SELECT * FROM user_details WHERE (username = '{$sessionkey}') LIMIT 1";
            $result= mysqli_query($connection,$query);
            if (!$result){
                die("Database connection failed");
            }

            while ($db=mysqli_fetch_row($result)){
                $user_id = $db[0];
            }
            $curdate = date("Y-m-d");
            $surtime = date("h:i:sa");
            
            if (mysqli_num_rows($result) == 1) {
                $query = "INSERT INTO payers
                (userID, username, amount, date, time, paid, recieved) 
                VALUES ('{$user_id}','{$sessionkey}','{$pamt}','{$curdate}','{$surtime}','{$paid}','{$recieved}')";

                $result = mysqli_query($connection,$query);

                if(!$result){
                    header('Location: ../dashboard/index.php?request_nosuccess=1');
                }else{
                    //header("location: ../profile.php");
                    header('Location: ../dashboard/index.php?request_success=1');
                    exit;
                }
                exit;
            }
        }else if ($pamt == "36000") {
            $query = "SELECT * FROM user_details WHERE (username = '{$sessionkey}') LIMIT 1";
            $result= mysqli_query($connection,$query);
            if (!$result){
                die("Database connection failed");
            }

            while ($db=mysqli_fetch_row($result)){
                $user_id = $db[0];
            }
            $curdate = date("Y-m-d");
            $surtime = date("h:i:sa");
            if (mysqli_num_rows($result) == 1){
                $query = "INSERT INTO payers
                (userID, username, amount, date, time, paid, recieved) 
                VALUES ('{$user_id}','{$sessionkey}','{$pamt}','{$curdate}','{$surtime}','{$paid}','{$recieved}')";

                $result=mysqli_query($connection,$query);
                if(!$result){
                    header('Location: ../dashboard/index.php?request_notsuccess=1');
                }else{
                    //header("location: ../profile.php");
                    header('Location: ../dashboard/index.php?request_success=1');
                }
            }
        }else{
            header('Location: ../dashboard/index.php?pckge_not_available=1');
        }
    }
?>