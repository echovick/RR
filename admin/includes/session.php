<?php 
    session_start();
    require("connection.php");
    
    $u = "";
    $user = "";

    function logged_in(){
		return isset($_SESSION['id']);
	}

    function confirm_logged_in(){
		if (!logged_in()) {
    		echo "<meta http-equiv='refresh' content='0;url=../'>";
		}
	}

	function confirm_logged_out(){
		if (logged_in()) {
    		echo "<meta http-equiv='refresh' content='0;url=dashboard/'>";
		}
	}
    
    function confirm_time_out(){
        $now = time(); // Checking the time now when home page starts.

        if (logged_in()) {
            if ($now > $_SESSION['expire']) {
                session_destroy();
                echo "<meta http-equiv='refresh' content='0;url=./'>";
            }
		}
       
    }
?>