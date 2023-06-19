<?php
session_start();
if (!isset($_SESSION["login"])){
  header ("Location: ../../login.php");
  exit;
}
require '../../functions.php';
// Query
$id = $_GET["id"];
$ganti  = query("SELECT * FROM adopsi WHERE id = $id")[0];
  $pet = query("SELECT * FROM pet");
if ( isset($_POST["submit"]) && ! empty($_POST['id'])){
  if (ubahadopsi($_POST) > 0){
    echo "
      <script>
        alert('Data Berhasil Diubah!');
        document.location.href = 'adopsi.php';
      </script>
    ";
  }else {
    echo "
      <script>
        alert('Data Gagal Diubah!');
        document.location.href = 'adopsi.php';
      </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Adopsi | Admin Control</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a41efb1c83.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../css/style2.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
     <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="C:\xampp\htdocs\Pemweb\EAS\Pawsips Petshop_FP\admin\index.php">
                <div class="sidebar-brand-text mx-3 pt-2">Admin Control</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../../index.php">
                  <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <!-- Nav Item - Charts Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCharts1"
                    aria-expanded="true" aria-controls="collapseCharts1">
                    <i class="bi bi-boxes"></i>
                    <span>Data</span>
                </a>
                <div id="collapseCharts1" class="collapse" aria-labelledby="headingCharts"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu :</h6>
                        <a class="collapse-item" href="../../inventory/pet/pet.php">Pets</a>
                        <a class="collapse-item" href="../../inventory/kategori/kategori.php">pet</a>
                        <a class="collapse-item" href="../../inventory/customer/customer.php">Customer</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCharts2"
                    aria-expanded="true" aria-controls="collapseCharts2">
                    <i class="bi bi-basket"></i>
                    <span>Form</span>
                </a>
                <div id="collapseCharts2" class="collapse" aria-labelledby="headingCharts"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu :</h6>
                        <a class="collapse-item" href="../reservasi/reservasi.php">Reservasi Control</a>
                        <a class="collapse-item" href="adopsi.php">Adopsi Control</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
             
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 pt-4 ps-2">PAWSIPS PETSHOP</h1>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
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
                <div class="d-flex justify-content-start pb-3">
                  <a href="adopsi.php"><button type="button" class="btn btn-light"><i class="bi bi-back"></i> Kembali</button></a>
                </div>
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ubah Adopsi</h1>
                    </div>
                <!-- Content Row -->
                    <!-- Formulir -->
                      <form action="" method ="post" enctype="multipart/form-data" class="row g-3">
                         <input type="hidden" name="id" value="<?= $ganti["id"]?>">
                        <div class="row">
                          <div class="col mb-3">
                            <label for="adopsi" class="form-label">Adopsi</label>
                            <select class="form-select" name="pet" id="pet" required>
                              <option selected></option>
                            <?php foreach ($pet as $pro) : ?>
                              <option value="<?=$pro['id']?>"><?=($pro['nama'])?></option>
                            <?php endforeach?>
                            </select>
                          </div>
                          <div class="col mb-3">
                            <label for="notelp" class="form-label">No Telp</label>
                            <input class="form-control" type="text" name="notelp" id="notelp" required autocomplete ="off" value="<?= $ganti["notelp"]?>">  
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="mb-2">
                              <label for="nama" class="form-label">Nama</label>
                                <input class="form-control" type="text" name="nama" id="nama" required autocomplete ="off" value="<?= $ganti["nama"]?>">  
                            </div>
                            <div class="mb-2">
                              <label for="waktu" class="form-label">Waktu</label>
                                     <input type="datetime-local" name="waktu" id="waktu" class="form-control"> 
                        </div>
                                            
                          </div>
                          <div class="col">
                            
                            <div class="mb-2">
                              <label for="pesan">Pesan</label>
                              <textarea class="form-control" name="pesan" id="pesan" style="height: 117px"></textarea>
                            </div>
                          </div>
                          
                        </div>
                        
                        
                        
                        <div class="d-flex justify-content-center mb-3">
                          <button type="submit" name="submit" class="btn btn-warning">Mengubah</button>
                        </div>
                      </form>
                    <!-- Akhir Formulir -->
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;  Pawsips Petshop. 2023</span>
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
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-warning" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- Script Default -->
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

</body>
</html>