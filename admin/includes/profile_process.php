<?php require_once("session.php"); ?>
<?php require_once("connection.php"); ?>
<?php require_once("functions.php"); ?>

<?php 

    //Declaration of Global vriables
    //--------------------------------
    $pname = "";
    $rname = "";
    $transacID = "";
    $amount = "";
    $confirm = "";
    $date = "";
    $ghdate = "";
    // ----------------------------

    //Code to merge users
    if (isset($_POST['merge'])){
        $pname = mysql_prep(trim($_POST['pname']));
        $rname = mysql_prep(trim($_POST['rname']));
        $transacID = mysql_prep(trim($_POST['transacID']));
        $amount = mysql_prep(trim($_POST['amount']));
        $merge_date = mysql_prep(trim($_POST['date']));
        $recieve_date = mysql_prep(trim($_POST['recieve_date']));
        $status = mysql_prep(trim($_POST['status']));

        $query="INSERT INTO transac (transacID,payer,recipient,amount,status,merge_date,recieve_date) 
        VALUES ('{$transacID}','{$pname}','{$rname}','{$amount}','{$status}','{$merge_date}','{$recieve_date}')";
        $result = mysqli_query($connection,$query);
        
        if(!$result){
            $_SESSION["message"] = 
            '
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> Something went wrong
            </div>
            ';
            echo "<meta http-equiv='refresh' content='0;url=../dashboard/'>";
        }else{
            $_SESSION["message"] = 
            '
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-thumbs-up"></i></strong> Merge Successful
            </div>
            ';
            echo "<meta http-equiv='refresh' content='0;url=../dashboard/'>";
        }
    }
?>