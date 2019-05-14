<?php require_once("session.php"); ?>
<?php require("functions.php"); ?>
<?php

if(isset($_POST["new_user"])){
    $un= mysql_prep(trim($_POST["username"]));
    $pw= mysql_prep(trim($_POST["password"]));
    $cpw= mysql_prep(trim($_POST["confirm_password"]));

		// Avoids duplicate username in the DB
		$sql = "SELECT * FROM admin where username = '{$un}' limit 1";
    $result= mysqli_query($connection,$sql);
		confirm_query($result);
		
		if (mysqli_num_rows($result) == 1){
			$_SESSION["message"] = 
				'
				<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Error!</strong> Username already exists
				</div>
				';
				echo "<meta http-equiv='refresh' content='0;url=../dashboard/'>";
		}
		else{
			// Makes sure the password fields are equal
			if ($pw == $cpw){

        $hpw = md5($pw); // MD5 Hashing technique
        $query = "INSERT INTO admin
        (username, password) 
        VALUES ('{$un}','{$hpw}')";
        
        $result= mysqli_query($connection,$query);
        if (!$result){
            die("Database connection failed: ");
        }else{
            // Success
            $_SESSION["message"] = 
                '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><i class="fa fa-thumbs-up"></i></strong> New User successfully created
                </div>
                ';
                echo "<meta http-equiv='refresh' content='0;url=../dashboard/'>";
        }
    } else{
        //Failed
        $_SESSION["message"] = 
        '
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> Passwords do not match
        </div>
        ';
        echo "<meta http-equiv='refresh' content='0;url=../dashboard/'>";
        
    }
		}

    

}
else{
	echo "<meta http-equiv='refresh' content='0;url=../dashboard/'>";
}



?>
<?php require_once("../includes/close_connection.php");?>
