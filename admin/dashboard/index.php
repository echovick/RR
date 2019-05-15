<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_time_out(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-thumbs-up"></i>
        </div>
        <div class="sidebar-brand-text mx-2">REWARDS RETURN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="./">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

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

            <!-- Logout -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#"  data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-power-off fa-fw"></i>
              </a>
            </li>

            <!-- Create New User -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#"  data-toggle="modal" data-target="#newUserModal">
                <i class="fas fa-user-plus fa-fw"></i>
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <?php
            if(isset($_SESSION["message"])){
              echo $_SESSION["message"];
            }
						unset($_SESSION["message"]);
          ?>

          <!-- 2nd Content Row -->
          <div class="row">

            <!-- Merge Users -->
            <div class="col-md-5">
              <div class="card shadow mb-4 p-0">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Merge Users</h6>
                </div>
                <!-- Card Header End -->
                <!-- Card Body -->
                <div class="card-body p-1">
									<?php
										$result = get_last_transaction();
										if($result){
											while ($row = mysqli_fetch_row($result)) {
												$id = $row[0];
											}
											if(empty($id)){
												$tid = date("dm").""."0";
											}else{
												$tid = date("dm")."".$id+1;
											}
										}										
									?>
                    <form class="user" action="../includes/profile_process.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control bg-transparent" name="transacID" value="<?php 	echo $tid; ?>" readonly>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control " name="pname" placeholder="Payer Name" minlength = "3" required>
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control " name="rname" placeholder="Recipient Name" minlength = "3" required>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-control border-0">Merge Date</div> 
                            <input type="date" class="form-control" name="date" required>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-control border-0">Status</div> 
                              <input type="text" class="form-control  bg-transparent" name="status" value="pending" readonly>
                          </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <div class="form-control border-0">Amount</div> 
                              <select type="" class="form-control " name="amount" >
                                <option>2000</option>
                                <option>4000</option>
                                <option>5000</option>
                                <option>10000</option>
                                <option>15000</option>
                                <option>25000</option>
                                <option>30000</option>
                                <option>35000</option>
                                <option>40000</option>
                                <option>45000</option>
                                <option>50000</option>
                              </select>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <div class="form-control border-0">Recieve Date</div> 
                              <input type="date" class="form-control " name="recieve_date" required>
                            </div>
                          </div>

                        <input type="submit" value="Submit" name = "merge" class="btn btn-primary btn-user btn-block">
                      </form>
                </div>
                <!-- Card Body End -->
              </div>
            </div>
            <!-- Merge Users End -->

            <!-- Pay Request -->
            <div class="col-md-4">
              <div class="card shadow mb-4 p-0">

                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary small">Pay Requests</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body p-1">
                  
                    <div class="table-responsive">
                        <table class="table table-bordered small" id="" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Username</th>
                              <th>Amount</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                               $result= get_pay_requests();
                              if($result){
                                while ($row = mysqli_fetch_array($result)) {
                                  $username = $row[3];
                                  $amount = $row[2];
                                  $date = $row[4];
                            ?>
                            <tr>
                              <td> <?php echo $username; ?> </td>
                              <td> <?php echo $amount; ?> </td>
                              <td> <?php echo $date; ?> </td>
                            </tr>
                            <?php
                                }
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>

                </div>
              </div>
              
            </div>
            <!-- Pay Request End -->


            <!-- Elligible Recipient -->
            <div class="col-md-3">
                <div class="card shadow mb-4 p-0">
  
                  <!-- Card Header  -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary small">Elligible Recipient</h6>
                  </div>
  
                  <!-- Card Body -->
                  <div class="card-body p-1">
                      <div class="table-responsive">
                          <table class="table table-bordered small" id="" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Username</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $result= get_elligible_recipients();
                                if($result){
                                  while ($row = mysqli_fetch_array($result)) {
                                    $username = $row[3];
                                    $amount = $row[2];
                              ?>
                              <tr>
                                <td>  <?php echo $username; ?> </td>
                                <td>  <?php echo $amount; ?> </td>
                              </tr>
                              <?php
                                  }
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
                  </div>
                </div>
                
              </div>
              <!-- Elligible Recipient End -->
          </div>
          <!-- 2nd Content Row End -->

          <!-- All Transaction Table -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary small">All Transactions</h6>
              </div>
              <div class="card-body p-1">
                <div class="table-responsive">
                  <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>transac_id</th>
                        <th>Payer</th>
                        <th>Recipient</th>
                        <th>Amount</th>
                        <th>Merge date</th>
                        <th>Recieve Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $result= get_all_transactions();
                        if($result){
                          while ($row = mysqli_fetch_array($result)) {
                            $id = $row[0];
                            $transac_id = $row[1];
                            $payer = $row[2];
                            $recipient = $row[3];
                            $amount = $row[4];
                            $merge_date = $row[6];
                            $recieve_date = $row[7];
                            $status = $row[5]; 
                      ?>
                      <tr>
                        <td> <?php echo $id; ?> </td>
                        <td> <?php echo $transac_id ?> </td>
                        <td> <?php echo $payer ?> </td>
                        <td> <?php echo $recipient ?> </td>
                        <td> <?php echo $amount ?> </td>
                        <td> <?php echo $merge_date ?> </td>
                        <td> <?php echo $recieve_date ?> </td>
                        <td> <?php echo $status ?> </td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <!-- All Transaction Table End -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; RewardsReturn.com</span>
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

          <!-- Creat New User Modal-->
          <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Admin User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
								<form class="user" action="../includes/reg_process.php" method="POST">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" name="username" placeholder="Enter Username" required minlength="5">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" name="password" placeholder="Enter Password" required minlength="8">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" name="confirm_password" placeholder="Confirm Password" required="required">
									</div>
									<input type="submit" name="new_user" value="Submit" class="btn btn-primary btn-user btn-block mb-3">
								</form>
              </div>
              
            </div>
          </div>
        </div>

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
          <a class="btn btn-primary" href="../includes/logout.php">Logout</a>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
