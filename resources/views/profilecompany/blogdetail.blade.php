<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Paradise Villas - Seminyak</title>
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
          <h2>Blog Details</h2>
          <ol>
            <li><a href="{{ route('profilecompany') }}">Home</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li>Blog Details</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="/image_blog/{{ $blogdetail->image_path }}" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{ $blogdetail->title }}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center mt-2"><i class="bi bi-person"></i> <a href="blog-details.html">{{ $blogdetail->author }}</a></li>
                  <li class="d-flex align-items-center mt-2"><i class="bi bi-clock"></i> <a href="blog-details.html">{{ $blogdetail->created_at->format('M d, Y') }}</a></li>
                  <li class="d-flex align-items-center mt-2"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">{{ $commentlist->count() }} Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              
              <div class="content">
              {!! $blogdetail->description !!}

              </div><!-- End post content -->

            </article><!-- End blog post -->

            <div class="post-author d-flex align-items-center">
              <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
              <div>
                <h4>{{ $about->name }}</h4>
                <br>

                <div class="social-links">
                  @foreach( $socialmedia as $rs )
                  <a href="{{$rs->link}}"><i class="bi bi-{{$rs->name}}"></i></a>
                  @endforeach
                </div>
                <p>{{ $about->description }}</p>
              </div>
            </div><!-- End post author -->

            <div class="comments">

              <h4 class="comments-count">{{ $commentlist->count() }} Comments</h4>

              @foreach( $commentlist as $rs )
              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="{{ asset('admin_assets/assets/img/blog/icon-user.png') }}" alt=""></div>
                  <div>
                    <h5><a href="">{{ $rs->name }}</a></h5>
                    <time datetime="2020-01-01">{{ $rs->created_at->format('M d, Y') }}</time>
                    <p>
                      {{ $rs->comment }}
                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->
              @endforeach

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="{{ route('profilecompany.commentblogdetail', $blogdetail->id ) }}" method="POST" enctype="multipart/form-data" >
                  @csrf
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input id="inputName" name="name" type="text" class="form-control" placeholder="Your Name*" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <input id="inputEmail" name="email" type="text" class="form-control" placeholder="Your Email*" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea id="inputComment" name="comment" type="text" class="form-control" placeholder="Your Comment*" required></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input id="inputComment" name="id_blog" type="hidden" class="form-control" value="{{ $blogdetail->id }}" ></input>
                    </div>
                  </div>
                  <button id="buttonComment" type="submit" class="btn btn-primary">Post Comment</button>
                </form>
              </div>
            </div><!-- End blog comments -->
          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="{{ route('profilecompany.blogsearch') }}" method="GET">
                  <input type="text" name="search" />
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

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
        </div>

      </div>
    </section><!-- End Blog Details Section -->

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
            <h4>Our Villas</h4>
            <ul>
              @foreach($villa as $rs)
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