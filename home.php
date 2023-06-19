<?php
require 'admin/functions.php';
$reservasi = query("SELECT * FROM reservasi");
  $qpet = "SELECT * FROM pet;";
    $result = $conn->query($qpet);
if ( isset($_POST["submit"])){
  if (tambahreservasi($_POST) > 0){
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
  <div class="hero_area">
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

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scrollto active" href="#pet"> Pets</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scrollto active" href="#service"> Services </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link scrollto active" href="#reservation">Reservation</a>
                </li>
              </ul>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <a href="admin/login.php">
                LOGIN
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Welcome to <br />
                            Pawsips!
                          </h1>
                          <p>
                          The Ultimate Partner In Pet Wellness!
                          Keeping Pets Healthy, Handling Pets Safely and Giving Pets The Best Products.
                          </p>
                          <div class="d-flex">
                            <a href="#pet" class="text-uppercase custom_orange-btn mr-3">
                              Adopt Now
                            </a>
                            <a href="#reservation" class="text-uppercase custom_dark-btn">
                              Reservation
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="images/slide-img1.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            New Online <br />
                            Petshop Website
                          </h1>
                          <p>
                            Pawsips is a New Online Petshop Website. <br />
                            We provide holistic premium pet food, grooming and retail products. Your pet needs a safe place to stay while you are away.
                          </p>
                          <div class="d-flex">
                            <a href="#pet" class="text-uppercase custom_orange-btn mr-3">
                            Adopt Now
                            </a>
                            <a href="#reservation" class="text-uppercase custom_dark-btn">
                              Reservation
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="images/slide-img2.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Pawsips <br />
                            Pet Services
                          </h1>
                          <p>
                          The once small shop and grooming salon with three store and grooming locations, a pet hotel, a vet care clinic to serve Surabaya’s growing pets’ and pet owners’ needs.
                          </p>
                          <div class="d-flex">
                            <a href="#pet" class="text-uppercase custom_orange-btn mr-3">
                            Adopt Now
                            </a>
                            <a href="#reservation" class="text-uppercase custom_dark-btn">
                              Reservation
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="images/slide-img3.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="custom_carousel-control">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>

  <!-- service section -->

  <section id="service" class="service_section layout_padding2 ">
    <div class="container">
      <h2 class="custom_heading">Our Services</h2>
      <p class="custom_heading-text">
      Pawsips Pet Services menyediakan layanan lengkap dan terbaik untuk hewan peliharaan anda: Grooming, Hotel, and Clinic.
      </p>
      <div class=" layout_padding2">
        <div class="card-deck">
          <div class="card">
            <img class="card-img-top" src="images/groming.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">PET GROOMING</h5>
              <p class="card-text">
                Melayani Jasa Grooming Kucing & Anjing - Grooming panggilan - Memanjakan & Memandikan Peliharaan Kesayangan Kamu.
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="images/hotel.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">PET HOTEL</h5>
              <p class="card-text">
                Melayani Jasa Penitipan Kucing dan Anjing Harian Dengan Pelayanan Terpercaya. Kesehatan, Kenyamanan, dan Kebahagiaan Anabul Kamu Merupakan Prioritas Kami.
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="images/clinic.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">PET CLINIC</h5>
              <p class="card-text">
                Merupakan Klinik Hewan yang Didukung Oleh Tenaga Medis Profesional (Dokter Hewan Praktisi) dalam Mendiagnosa Penyakit dan juga Memiliki Rasa Belas Kasih Terhadap Hewan Kesayangan Anda.
              </p>
            </div>
          </div>
      
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- start pet section -->
  <section id="pet" class="pet_section layout_padding2 ">
    <div class="container">
      <h2 class="custom_heading">Pets</h2>
      <p class="custom_heading-text">
      Hey! Feeling Lonely? Yuk Adopsi Teman Barumu Disini!
      </p>
      <div class="row layout_padding2">
        <div class="card-deck">
            <?php
                while($data = mysqli_fetch_array($result))
                {
                  ?>
                  <div class="col-md-4 mb-3">
          <div class="card">
            <div class="pet_img-box d-flex justify-content-center align-items-center">
              <img class="mt-3" src="admin/img/pets<?php echo $data['img'];?>" alt="Responsive image" width="250px" height="250px">
            </div>
            <div class="card-body">
            <h3>
              <h5><?php echo $data['nama']; ?></h5>
            </h3>
              <p class="card-text">
                            <h6><?php echo $data['deskripsi']; ?></h6>
              </p>
            </div>
            <div>
              <a href="adopt.php" class="custom_dark-btn mb-4">
                Adopt Now
              </a>
            </div>
          </div>
          </div>
            <?php
                }
            ?>
    
          
          </div>
        </div>
      </div>
    
  </section>
  <!-- end pet section -->

  <!-- tasty section -->
  <section class="petpaw_section">
    <div class="container_fluid">
      <h2>
        Pawsips Petshop
      </h2>
    </div>
  </section>
  <!-- end tasty section -->

  <!-- Veterinarian section -->

  <section id="vet" class="client_section layout_padding">
    <div class="container">
      <h2 class="custom_heading">Our Veterinarian</h2>
      <p class="custom_heading-text">
        Layanan Pet Clinic Pawsips Petshop Didukung Oleh Tenaga Medis Profesional (Dokter Hewan Praktisi) dalam melayani.
      </p>
      <div>
        <div id="carouselExampleControls-2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="client_container layout_padding2">
                <div class="client_img-box">
                  <img src="images/doc1.png" alt="" />
                </div>
                <div class="client_detail">
                  <h3>
                    Drh. Erizal Rafsanjani
                  </h3>
                  <p class="custom_heading-text">
                    Alumnus: Universitas Sumatera Utara, 2023<br />
                    Bekerja: 4 tahun 
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="client_container layout_padding2">
                <div class="client_img-box">
                  <img src="images/doc2.png" alt="" />
                </div>
                <div class="client_detail">
                  <h3>
                    Drh. Dina Yuniastuti
                  </h3>
                  <p class="custom_heading-text">
                    Alumnus: Universitas Jenderal Achmad Yani, 2013<br />
                    Bekerja: 5 tahun 
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="client_container layout_padding2">
                <div class="client_img-box">
                  <img src="images/doc3.png" alt="" />
                </div>
                <div class="client_detail">
                  <h3>
                    Drh. Made Monica
                  </h3>
                  <p class="custom_heading-text">
                    Alumnus: Universitas Udayana, 2016<br />
                    Bekerja: 3 tahun 
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="custom_carousel-control">
            <a class="carousel-control-prev" href="#carouselExampleControls-2" role="button" data-slide="prev">
              <span class="" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls-2" role="button" data-slide="next">
              <span class="" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- end Veterinarian section -->

  <!-- reservation section -->
  <section id="reservation" class="reservation_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Reservation
      </h2>
     <form action="" method ="post" enctype="multipart/form-data" >
      <div class="row">
        <div class="col-md-8 mr-auto">
          <form action="">
            <div class="reservation_form-container">
              <div>
                <div>
                <select class="form-select form-select-sm col-md-6 mr-auto mb-2" aria-label="Default select example" name="reservasi" required>
                  <option selected></option>
                  <option value="grooming">Pet Grooming</option>
                  <option value="penitipan">Pet Hotel</option>
                  <option value="konsultasi">Pet CLinic</option>
                </select>
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
                <input type="datetime-local" name="waktu" id="waktu" class="form-control "required> 
                </div>
                <div class="mt-5">
                  <input type="text" placeholder="Message" name="pesan" required>
                </div>
                  <input type="hidden" name="status" value="Waiting" required>
                <div class="mt-5">
                  <button type="submit" name="submit">
                    send
                  </button>
                </div>
              </div>
              </form>

            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- end reservation section -->


  <!-- map section -->
  <section class="map_section">
    <div id="map" class="h-100 w-100 ">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.20750916582!2d112.71268375!3d-7.275619450000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1686773265005!5m2!1sen!2sid" width="1920" height="450" style="border:5;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>

  <!-- end map section -->

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
          <h5>
            Services
          </h5>
          <ul>
            <li>
            <a href="home.php"> Pet Grooming</a>
            </li>
            <li>
            <a href="home.php"> Pet Hotel</a>
            </li>
            <li>
            <a href="home.php"> Pet Clinic</a>
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


  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->
</body>

</html>