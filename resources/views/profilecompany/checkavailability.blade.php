<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Paradise Villas - Seminyak Bali</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/image_about/{{$about->favicon_image_path}}" rel="icon">
  <link href="{{ asset('admin_assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin_assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/css/variables.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/css/main.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/image/{{$about->image_path}}" alt=""> 
        <!-- <h2>{{ $about->name }}<span>.</span></h2> -->
      </a>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto" href="{{ route('profilecompany') }}">Home</a></li>
            <li><a class="nav-link scrollto" href="{{ route('profilecompany') }}#about">About</a></li>
            <li><a class="nav-link scrollto" href="{{ route('profilecompany') }}#services">Villas</a></li>
            <li><a class="nav-link scrollto" href="{{ route('profilecompany') }}#portfolio">Gallery</a></li>
            <li><a class="nav-link scrollto" href="{{ route('profilecompany') }}#recent-blog-posts">Blog</a></li>
            <li><a class="nav-link scrollto" href="{{ route('profilecompany') }}#contact">Contact</a></li> 
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Availability</h2>
          <ol>
            <li><a href="{{ route('profilecompany') }}">Home</a></li>
            <li>Availability</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">

        

        <!-- Blog -->
        @if(  $isBooked == 1 )
        <div class="col-lg-8">
          <div class="row gy-4 posts-list">
            <p>Sorry, Villa is Not Available :(</p>
          </div>
        </div>
        <h2>Another Villa Available</h2>
        <div class="col-lg-8">
          <div class="row gy-4 posts-list">
            @foreach($villa as $rs)
              <div class="col-lg-6">
                  <article class="d-flex flex-column">
                    <div class="post-img">
                      <img src="/image_villa/{{ $rs->image_path }}" alt="" class="img-fluid">
                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                      <h2 class="title">
                          <a href="{{ route('profilecompany.blogdetail', $rs->id) }}">{{ $rs->name}}</a>
                      </h2>
                      </div>
                    </div>

                    <div class="meta-top">
                      <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-cash-stack"></i>{{ $rs->price }}</li>
                      </ul>
                      <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-geo-alt-fill"></i>{{ $rs->location }}</li>
                      </ul>
                      <ul>
                      <li class="d-flex align-items-center">
                          @for ($i = 0; $i < $rs->rate ; $i++)
                            <i style="color:#fedd00;"  class="bi bi-star-fill"></i>
                          @endfor
                      </li>
                      </ul>
                    </div>
                    <div class="content">
                      <p style="text-align:left;">{{ $rs->description }}</p>
                    </div>
                    <div class="read-more mt-auto align-self-start">
                      <a  href="{{ route('profilecompany.bookingconfirmation', [$rs->id, $checkin, $checkout] )}}">Book Now</a>
                      <a  style="background: #1D5D9B;" href="#">Detail</a>
                    </div>
                </article>        
              </div>    
            @endforeach
          </div>
        </div>
        @else
        <div class="col-lg-8">
          <div class="row gy-4 posts-list">
            @foreach($villa as $rs)
              <div class="col-lg-6">
                  <article class="d-flex flex-column">
                      <div class="post-img">
                      <img src="/image_villa/{{ $rs->image_path }}" alt="" class="img-fluid">
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                        <h2 class="title">
                            <a href="{{ route('profilecompany.villadetail', $rs->id) }}">{{ $rs->name}}</a>
                        </h2>
                        </div>
                      </div>
                      <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-cash-stack"></i>{{ $rs->price }}</li>
                      </ul>
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-geo-alt-fill"></i>{{ $rs->location }}</li>
                      </ul>
                      <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-award-fill"></i>
                          @for ($i = 0; $i < $rs->rate ; $i++)
                            <i style="color:#fedd00;" class="bi bi-star-fill"></i>
                          @endfor
                      </li>
                      </ul>
                      </div>
                      <div class="content">
                        <p style="text-align:left;">{{ $rs->description }}</p>
                      </div>
                      <div class="read-more mt-auto align-self-start ">
                          <a  href="{{ route('profilecompany.bookingconfirmation', [$rs->id, $checkin, $checkout])}}">Book Now</a>
                          <a  style="background: #1D5D9B;" href="{{ route('profilecompany.villadetail', $rs->id) }}">Detail</a>
                      </div>
                  </article>        
              </div>    
            @endforeach
             
          </div>
        </div>
        @endif
        <!-- End Blog -->


        <!-- Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="{{ route('profilecompany.blogsearch') }}" method="GET">
                <input type="text" name="search" >
                <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>

            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Categories</h3>
              <ul class="mt-3">
                  @foreach($categoriesblog as $rs)
                  <li><a href="{{ route('profilecompany') }}/blogcategories/{{$rs->id}}">{{ $rs->name }}<span> ( {{ $blogAll->where('id_categoriesblog', $rs->id)->count() }} )</span></a></li>
                  @endforeach
              </ul>
            </div><!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Recent Posts</h3>
              <div class="mt-3">
                @foreach($blogside as $rs)
                <div class="post-item mt-3"><div>
                    <h4><a href="{{ route('profilecompany.blogdetail', $rs->id) }}"><b>{{ $rs->title }}</b></a></h4>
                    <time datetime="2020-01-01">{{ $rs->created_at->format('M d, Y') }}</time>
                    </div>
                </div><!-- End recent post item-->
                @endforeach
              </div>
            </div><!-- End sidebar recent posts-->

          </div><!-- End Blog Sidebar -->
        </div>

    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>{{ $about->name }}</h3>
              <p>
                {{ $contact->address }} <br>
                <strong>Phone : </strong>{{ $contact->phonenumber }}<br>
                <strong>Email : </strong>{{ $contact->email }}<br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a class="nav-link scrollto" href="{{ route('profilecompany') }}#about">About</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="nav-link scrollto" href="{{ route('profilecompany') }}#services">Villas</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="nav-link scrollto" href="{{ route('profilecompany') }}#portfolio">Gallery</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="nav-link scrollto" href="{{ route('profilecompany') }}#recent-blog-posts">Blog</a></li>
              <li><i class="bi bi-chevron-right"></i> <a class="nav-link scrollto" href="{{ route('profilecompany') }}#contact">Contact</a></li> 
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              @foreach($villaAll as $rs)
                <li><i class="bi bi-chevron-right"></i> <a href="{{ route('profilecompany.villadetail', $rs->id) }}">{{$rs->name}}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="{{ route('profilecompany.infosubscription') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="email" name="email" required>
              <input class="btn" type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>{{ $about->name }}</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          @foreach($socialmedia as $rs)
          <a href="{{$rs->link}}" class="twitter" target="_blank" ><i class="bi bi-{{$rs->name}}"></i></a>
          @endforeach
        </div>

      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin_assets/assets/js/main.js') }}"></script>

</body>

</html>