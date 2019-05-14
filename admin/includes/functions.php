<?php require_once("connection.php"); ?>
<?php
  // This file maintains all basic functions
  function mysql_prep( $value ){
  $magic_quotes_active = get_magic_quotes_gpc();
  $new_enough_php = function_exists("mysql_real_escape_string"); // i.e PHP>=V4.3.0
  if( $new_enough_php ) { // PHP V4.3.0 or higher
    // undo any magic quote effects so mysql_real_escape_string can do the work
    if( $magic_quotes_active ){ $value = stripslashes($value); }
    $value = mysql_real_escape_string($value);
  } else {  // before PHP v4.3.0
    // if magic quotes aren't already on then add slashes manually
    if( !$magic_quotes_active ) { $value = addslashes($value); }
    // if magic quotes are active, then the slashes already exist
  }
  return $value;
  }

  function redirect_to( $location = NULL ){
    if ($location != NULL) {
      header("Location: {$location}");
    exit;
    }
  }

	function confirm_query($result_set){
		if(!$result_set){
      die("Database query failed: " . mysql_error() );
    }
  }
  
  function get_pay_requests($public = true){
		global $connection;
    $query = "SELECT * FROM payers WHERE (paid = '0' AND recieved = '0')";
    $result= mysqli_query($connection,$query);
    confirm_query($result);
    return($result);
  }

  function get_elligible_recipients($public = true){
		global $connection;
		$query = "SELECT * FROM payers WHERE (paid = '1') AND (recieved = '0')";
		$result = mysqli_query($connection,$query);
    confirm_query($result);
    return($result);
  }

  function get_all_transactions($public = true){
		global $connection;
		$query = "SELECT * FROM transac";
		$result = mysqli_query($connection,$query);
    confirm_query($result);
    return($result);
  }

  function get_last_transaction($public = true){
		global $connection;
		$sql = "SELECT * FROM `transac` ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($connection,$sql);
    confirm_query($result);
    return($result);
  }
?>