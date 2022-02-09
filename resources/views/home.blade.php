<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pelita Nusantara Jaya Logistik</title>

  <!-- Bootstrap core CSS -->
  <link href="/asset_sb_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/asset_sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/asset_sb_admin/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="/asset_sb_admin/css/landing-page.min.css" rel="stylesheet">
  <link rel="icon" href="/asset_sb_admin/img/logoico.ico">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="/asset_sb_admin/img/logosvg.svg" width="30" height="30" alt="" loading="lazy"> Pelnus Jaya Logistik</a>
      <a class="btn btn-primary" href="/auth">Login</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-1">Ekspedisi Muatan Kapal Laut</h1>
          <h3 class="mb-5">Pelita Nusantara Jaya Logistik</h3>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form method="post" action="/cari">
          @csrf
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="text" name="cari" class="form-control form-control-lg @error('cari') is-invalid @enderror" placeholder="Masukan No Bill Of Lading">
                @error('cari')
									<div class="invalid-feedback badge-danger">
										{{$message}}
									</div>
							 	@enderror
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" name="submit" class="btn btn-block btn-lg btn-primary">Cari</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>
  @yield('container')

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-rocket m-auto text-primary"></i>
            </div>
            <h3>Cepat</h3>
            <p class="lead mb-0">Layanan kami cepat, sejak pertama anda menggunakan layanan kami!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-map m-auto text-primary"></i>
            </div>
            <h3>Dimana Saja</h3>
            <p class="lead mb-0">Kami antar barang anda sampai di tempat anda!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-call-in m-auto text-primary"></i>
            </div>
            <h3>Layanan Pengguna</h3>
            <p class="lead mb-0">Costumer service kami fast respon, jika anda mengalami kendala dengan layanan kami!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('/asset_sb_admin/img/gambar16.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Forklift</h2>
          <p class="lead mb-0">Jangan khawatir jika barang anda adalah barang berat yang tidak bisa mengunakan tenaga manusia, Forklift kami siap membantu tanpa biaya tambahan!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('/asset_sb_admin/img/gambar13.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Head Truck</h2>
          <p class="lead mb-0">Anda ingin kontenernya sampai didepan tempat anda? Jangan khawatir kami punya Head Truck untuk mengangkut kontener anda dengan banyak persediaan trailer yang kami punya!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('/asset_sb_admin/img/gambar10.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Truck &amp; Helper</h2>
          <p class="lead mb-0">Jangan Khawatir kami punya Truck dan Helper yang bisa membawa barang anda jika tidak punya lahan parkir yang besar! Kami Solusinya.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Apa yang orang lain katakan...</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="/asset_sb_admin/img/testimonials-1.jpg" alt="">
            <h5>Margaret E.</h5>
            <p class="font-weight-light mb-0">"Layanannya cepat! Terima kasih pelnus!"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="/asset_sb_admin/img/testimonials-2.jpg" alt="">
            <h5>Fred S.</h5>
            <p class="font-weight-light mb-0">"Ini bukan ekspedisi kaleng-kaleng, alatnya lengkap semua, jadi ngak repot deh. Thanks yaa"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="/asset_sb_admin/img/testimonials-3.jpg" alt="">
            <h5>Sarah W.</h5>
            <p class="font-weight-light mb-0">"Terima kasih banyak ya buat layanan pelnus, barangnya udah nyampe nie thanks"</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4 ">Ready to get started? Use our service now!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <!-- <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
              </div>
            </div>
          </form> -->
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#" data-toggle="modal" data-target="#about">Tentang kami</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#" data-toggle="modal" data-target="#exampleModal">Kontak</a>
            </li>
            <!-- <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#" class="disabled">Syarat Penggunaan</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Kebijakan Pribadi</a>
            </li> -->
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website {{date('Y')}}. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-linkedin fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Modal For Contact-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kontak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<p>Anda dapat menghubungi kami di nomor kontak dibawah ini :</p>
        <h5>Telp   : 120-368-888</h5>
        <h5>WA     : 0852-4437-3388</h5>
        <h5>E-Mail : admin@pelnus.com</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
  </div>
  <!-- Modal For About-->
  <div class="modal fade" id="about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aboutLabel">Tentang kami</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>PT.Pelita Nusantara Jaya Logistik</h4>
        <p>Ekspedisi ini sudah berdiri dan melayani selama lebih dari 20 tahun. Kami selalu konsisten untuk memberikan layanan terbaik kepada pengguna jasa dan layanan
        kami, sehingga ekspedisi ini terus ada sampai saat ini. Kami berpengalaman dalam 
    	hal bongkar muat kontener dari dan ke pelabuhan, kami bekerja sama dengan setiap
    	pelayaran untuk memaksimalkan pelayanan jasa kepada pengguna jasa dan layanan kami.</p>

    	<p><em>Alamat : Jl.Trikora Sowi 1, Manokwari-Papua Barat</em><br><em>Email  : admin@pelnus.com</em></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="asset_sb_admin/vendor/jquery/jquery.min.js"></script>
  <script src="asset_sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
