<?php require_once("../includes/profile_process.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php  if(isset($_SESSION['username'])){echo $_SESSION['username'];} else {header("Location: ../index.php");exit;} ?> - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">RewardsReturn <sup>.com</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard - <?php  if(isset($_SESSION['username'])){echo $_SESSION['username'];} else {header("Location: ../index.php");exit;} ?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-home fa-cog"></i>
          <span>Home</span>
        </a>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user fa-cog"></i>
          <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Details</h6>
            <a class="collapse-item" href="view.php">View Profile</a>
            <a class="collapse-item" href="bank.php">Bank Details</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="history.php">
          <i class="fas fa-fw fa-history"></i>
          <span>History</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php
                  $query = "SELECT * FROM transac WHERE payer = '{$sessionkey}' AND status = 'pending' ";
                  $result = mysqli_query($connection,$query);
                ?>
                <span class="badge badge-danger badge-counter"><?php if(mysqli_num_rows($result)>0){echo 1;}?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <?php
                  if (mysqli_num_rows($result) > 0){
                    echo '<h6 class="dropdown-header">
                            Alerts Center
                          </h6>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                              <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                              </div>
                            </div>
                            <div>
                              <div class="small text-gray-500">'.date("d F Y").'</div>
                              <span class="font-weight-bold">You Have Been Merged</span>
                            </div>
                          </a>';
                  }else{
                    echo '<a class="dropdown-item text-center small text-gray-500" href="#">No New Notificaion</a>';
                  }
                ?>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-user"></i> <?php  if(isset($_SESSION['username'])){echo $_SESSION['username'];} else {header("Location: ../index.php");exit;} ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard - <?php  if(isset($_SESSION['username'])){echo $_SESSION['username'];} else {header("Location: ../index.php");exit;} ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending Requests</div>
                      <?php
                        $query = "SELECT * FROM payers WHERE username = '{$sessionkey}' ";
                        $result = mysqli_query($connection,$query);

                        $pending_request = mysqli_num_rows($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending_request;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Payed</div>
                      <?php
                        $query = "SELECT * FROM transac WHERE payer = '{$sessionkey}' AND status = 'confirmed' ";
                        $result = mysqli_query($connection,$query);
                        $total_paid = 0;
                        while ($db=mysqli_fetch_row($result)){
                          $total_paid = $total_paid + $db[4];
                        }
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><del>N</del><?php echo $total_paid;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Earned</div>
                      <?php
                        $query = "SELECT * FROM transac WHERE recipient = '{$sessionkey}' AND status = 'confirmed' ";
                        $result = mysqli_query($connection,$query);
                        $total_recieved = 0;
                        while ($db=mysqli_fetch_row($result)){
                          $total_recieved = $total_recieved + $db[4];
                        }

                        $total_earned = $total_recieved - $total_paid;
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><del>N</del><?php echo $total_earned;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">All Transactions</div>
                      <?php
                        $query = "SELECT * FROM transac WHERE (recipient = '{$sessionkey}' OR payer = '{$sessionkey}') AND status = 'confirmed' ";
                        $result = mysqli_query($connection,$query);

                        $total_transac = mysqli_num_rows($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_transac;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-history fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Request To Pay</h6>
                </div>
                <div class="card-body">
                  <p>Click the button below to make a payment request. Your request will be confirmed and you will recieve a merging info in less than 48hrs to wchich you will be required to pay. You can request Among the following packages: N12,000, N24,000 And N36,000</p>
                  <form class="form-inline" method="post" action="../includes/profile_process.php">
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <span>Package Amount</span> 
                        <select type="" class="form-control " name="amt" >
                          <option>12000</option>
                          <option>24000</option>
                          <option>36000</option>
                        </select>
                      </div>
                      <button type="submit" name="requestpay" class="btn btn-sm btn-primary">Request to Pay</a>
                    </div>
                    <!--<input type="text" minlength="4" class="form-control" name="amt" placeholder="Package Amount" required>-->
                  </form>
                </div>
                <?php
                    if(isset($_GET['request_success'])){
                      echo 
                      "<hr><h5 style='text-align:center;'>Request Successfull</h5>
                      <h5 class='card-title'></h5>
                      <p class='card-text'>You will be merged in less than 24hours</p>
                      <a class='btn btn-primary btn-sm' href='../dashboard'>OK</a>
                     ";
                    }

                    if(isset($_GET['request_nosuccess'])){
                      echo 
                      "<hr><h5 style='text-align:center;'>Request Was Not Sent Successfully</h5>
                      <a class='btn btn-primary btn-sm' href='../dashboard'>OK</a>
                     ";
                    }

                    if(isset($_GET['pckge_not_available'])){
                      echo 
                      "<hr><h5 style='text-align:center;'>Package Not Available</h5>
                      <a class='btn btn-primary btn-sm' href='../dashboard'>OK</a>
                     ";
                    }
                  ?>
              </div>
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Retrieve User Information</h6>
                </div>
                <div class="card-body">
                  <div class="alert alert-info">
                    <small>Type in the username of the person you where merged with to see contact details</small>
                    <form class="form-inline mb-3" method="post" action="?retrieveuser=1">
                      <input type="text" name="chkuser" class="form-control" id="exampleInputNumber" aria-describedby="" placeholder="Retrieve user contacts" required>
                      <button class="btn btn-sm btn-primary" type="submit" name="retrieveuser">check username</button>
                    </form>
                    <?php
                      //Code to retrieve user contacts and details
                      if (isset($_GET['retrieveuser'])){
                        $userchk = trim($_POST['chkuser']);
                        
                        $query = "SELECT * FROM user_details WHERE (username = '{$userchk}') LIMIT 1";
                        $result= mysqli_query($connection,$query);
                        if (!$result){
                          die("Database connection failed");
                        }

                        if (mysqli_num_rows($result)==1){
                          
                          while ($db=mysqli_fetch_row($result)){
                          $useridoutput = $db[0];
                          $userphoneoutput = $db[1];
                          $userbn = $db[6];
                          $userno = $db[7];
                          $userat = $db[8];
                          $useran = $db[9];
                          $phone = $db[4];
                          }
                        
                          echo 
                          " <hr>
                            <h5>Details Search Result For: ".$userchk."</h5>                        
                            <strong><p>User Name: ".$userphoneoutput."</p></strong>
                            <strong><p>Phone No: ".$phone."</p></strong>
                            <strong><p>Bank: ".$userbn."</p></strong>
                            <strong><p>Account Number: ".$userno."</p></strong>
                            <strong><p>Account Type: ".$userat."</p></strong>
                            <strong><p>Beneficiary Name: ".$useran."</p></strong>
                            <hr>
                            <a class='btn btn-primary btn-sm' href='../dashboard'>OK</a>
                          ";
                        }else{
                          echo 
                          " <hr>
                            <h5>Details Search Result For: ".$userchk."</h5>                        
                            <strong><p>There where no details found for the above user</p></strong>
                            <strong><p>Possible Reasons: User Doesnt Exits Or Username was wrongly spelt, Check Spelling and try again</p></strong>
                            <a class='btn btn-primary btn-sm' href='../dashboard'>OK</a>";
                        }
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-4">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Merging Information</h6>
                </div>
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:10px;">
                        <thead>
                          <tr>
                            <th>transacID</th>
                            <th>Payer</th>
                            <th>Recipient</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Merge Date</th>
                            <th>Recieve Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            //code to grab user information for display thus the 'dis' prefix which entails display
                            $num = 'pending';
                            $query = "SELECT * FROM transac WHERE (payer = '{$sessionkey}' OR recipient = '{$sessionkey}') AND (status = '{$num}')";
                            $result= mysqli_query($connection,$query);
                            if (!$result){
                              echo '<p>You are not merged with anyone at the moment, Request a payment if you have not or if you are expecting to be merged, check back with 12hours, do not hesitate to contact us if you encounter any problem or you havent been merged after 24hrs</p>';
                            }
                            
                            if(mysqli_num_rows($result) < 1){
                              echo '<p>You are not merged with anyone at thing moment, Request a payment if you have not or if you are expecting to be merged, check back with 12hours, do not hesitate to contact us if you encounter any problem or you havent been merged after 24hrs</p>';
                            }

                            while ($db=mysqli_fetch_row($result)){
                              echo 
                              "<tr>".
                                "<td>".$db[1]."</td>".
                                "<td>".$db[2]."</td>".
                                "<td>".$db[3]."</td>".
                                "<td>".$db[4]."</td>".
                                "<td>".$db[5]."</td>".
                                "<td>".$db[6]."</td>".
                                "<td>".$db[7]."</td>".
                              "</tr>";
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Confirm Payment</h6>
                </div>
                <div class="card-body">
                <p class="card-text">Type in or paste the transaction ID or the transaction you want to confirm and click confirm to confirm the payment</p>
                  <form class="form-inline mb-3" method="post" action="../includes/profile_process.php">
                  <input type="number" name="confirmid" class="form-control" id="exampleInputNumber" aria-describedby="" placeholder="Transaction code here" required>
                    <button class="btn btn-primary" type="submit" name="confirmtransac">Confirm</button>
                  </form>
                  <?php
                    if(isset($_GET['confirm_success'])){
                      echo 
                          "<hr><h5 style='text-align:center;'>Confirmation Successfull</h5>
                          <h5 class='card-title'></h5>
                          <strong><p class='card-text'>Payment with transaction ID: ".$_SESSION['transacID']." has been confirmed!!!</p></strong>
                          <hr>
                          <p>This is to certify that user (".$_SESSION['user'].") has recieved payment for this transaction in full!</p>
                          <a class='btn btn-primary btn-sm' href='../dashboard'>OK</a>
                         ";
                    }

                    if(isset($_GET['confirm_nosuccess'])){
                      echo 
                      "<hr><h5 style='text-align:center;'>Fatal Error: Confirmation Failed!!!</h5>
                      <h5 class='card-title'></h5>
                      <p class='card-text'>SORRY ".$_SESSION['user'].": Transaction with ID (".$_SESSION['transacID'].") Cannot be confirmed by you</p>
                      <a class='btn btn-primary btn-sm' href='../dashboard'>OK</a>
                     ";
                    }
                  ?>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
