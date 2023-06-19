<?php
require 'admin/functions.php';
// Query
    $adopsi = query("SELECT p.id id, k.nama pet, p.nama nama, notelp, waktu, pesan FROM  adopsi p
                        JOIN pet k ON (p.pet=k.nama)");
    $pet = query("SELECT * FROM pet");
    //tombol cari
    if ( isset($_POST["cari"])){
        $adopsi = cariadopsi($_POST["keyword"]);
    }
    if ( isset($_POST["submit"])){
  
        if (tambahadopsi($_POST) > 0){
    echo "
      <script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'home.php';
      </script>
    ";
  }else {
    echo "
      <script>
        alert('Data Gagal Ditambahkan!');
        document.location.href = 'home.php';
      </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Pawsips Petshop</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="home.php">
            <img src="images/logo.png" alt="" /><span>
              Pawsips Petshop
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
      </div>
    </header>
    <!-- end header section -->

  </div>

<!-- BACK BUTTON -->
  <div>
    <a href="home.php" class="custom_dark-btn">
      BACK
    </a>
  </div>

  <!-- reservation section -->
  <section id="reservation" class="reservation_section layout_padding2">
    <div class="container">
      <h2 class="font-weight-bold">
        Adoption
      </h2>
      <div class="row">
        <div class="col-md-8 mr-auto">
        
       <form action="" method ="post" enctype="multipart/form-data" >
            <div class="reservation_form-container">
              <div>
                <div>
                               <select class="form-select" name="pet" id="pet" placeholder="Nama Pets Yang Kamu Ingin Adopsi"  required>
                              <option selected >Pilih Pets</option>
                            <?php foreach ($pet as $pro) : ?>
                              <option value="<?=$pro['id']?>"><?=($pro['nama'])?></option>
                            <?php endforeach?>
                            </select>
                          </div>
                </div>
                <div>
                  <input type="text" placeholder="Name" name="nama" required>
                </div>
                <div>
                  <input type="alamat" placeholder="Alamat" name="alamat" required>
                </div>
                <div>
                  <input type="text" placeholder="Phone Number" name="notelp" required>
                </div>
                <div>
                <input type="datetime-local" name="waktu" id="waktu" class="form-control" required>
                </div>
                <div class="mt-5">
                  <input type="text" placeholder="Reason to Adopt" name="pesan" required>
                </div>
                <div class="mt-5">
                  <button type="submit" name="submit">
                    send
                  </button>
                </div>
              </div>

            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- end reservation section -->

  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>
            Link
          </h5>
          <ul>
            <li>
            <a href="home.php"> Home</a>
            </li>
            <li>
            <a href="home.php"> Pets</a>
            </li>
            <li>
            <a href="home.php"> Services</a>
            </li>
            <li>
            <a href="home.php"> Reservation</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <div class="social_container">
            <h5>
              Follow Us
            </h5>
            <div class="social-box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>

              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
          <div class="subscribe_container">
            <h5>
              Subscribe Now
            </h5>
            
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2023 All Rights Reserved By
      <a href="https://html.design/">Pawsips Petshop.</a>
    </p>
  </section>
  <!-- footer section -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->
</body>

</html>