<?php
require_once 'inc/config.php';
if (isset($_SESSION['auth']) && $_SESSION['auth']) {
   // header('Location: login.php');
}

$message = "";

if (isset($_POST['submit'])) { 

    try {
        $q = $conn->query("UPDATE customers SET balance=balance-".$_POST['balance']." WHERE id=".$_POST['from_account']."");

        if($q){
            $q = $conn->query("UPDATE customers SET balance=balance+".$_POST['balance']." WHERE id=".$_POST['to_account']."");
            $message = 'Balance transfered successfully';
        } else {
            $message = 'Failed to transfer';
        }
    } catch(Exception $e) {
        $message = 'Failed to transfer';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A/C Management System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once('common/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                 <?php include_once('common/header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Grow In Utility -->
                        <div class="col-lg-6">
                                    <div class="card position-relative">
                                        <div class="card-body"><?php echo $message; ?><div>
                                        <h1 class="h4 text-gray-900 mb-4">Transfer Balance</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="form-control" name="from_account">
                                                <?php 
                                                    $data = $conn->query('SELECT * FROM customers')->fetchAll();    
                                                    foreach($data as $item) {
                                                ?>
                                                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="to_account">
                                                <?php 
                                                    $data = $conn->query('SELECT * FROM customers')->fetchAll();    
                                                    foreach($data as $item) {
                                                ?>
                                                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" required name="balance" class="form-control form-control-user" id="exampleInputBalance"
                                                placeholder="A/C Balance">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Register 
                                        </button>
                                    </form>
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
                        <span>Copyright &copy; Your Website 2020</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>