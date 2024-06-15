<div class="hero_area">
  
    <header class="header_section" style="background-color: #222831;">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span>
              Prospero Barn
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('menuUsers') }}">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('aboutUsers') }}">About</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="book.html">Book Table</a>
              </li> -->
            </ul>
            <div class="user_option">
            
            @auth
            <a href="{{ route('myprofile.edit') }}" class="user_link" title="My Profile">
    <i class="fa fa-user" aria-hidden="true"></i>
</a>
              @endauth
             
              
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
              @guest
              <a href="/login" class="order_online">
                Login
              </a>
              @endguest
              @auth
              <form action="{{route('logout')}}" method="post">
          @csrf
          <button type="submit" class="order_online">Logout</button>
        </form>
              @endauth
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- slider section -->

    <!-- slider section -->
    <section class="slider_section">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('image/slider/slider-1.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6">
                                <div class="detail-box">
                                    <h1>Family Restaurant</h1>
                                    <p>
                                    Stylish cafe serving Western & Asian fare in a contemporary building shaped like a barn.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('image/slider/slider-2.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6">
                                <div class="detail-box">
                                    <h1>Family Restaurant</h1>
                                    <p>
                                    Stylish cafe serving Western & Asian fare in a contemporary building shaped like a barn.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('image/slider/slider-3.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6">
                                <div class="detail-box">
                                    <h1>Family Restaurant</h1>
                                    <p>
                                    Stylish cafe serving Western & Asian fare in a contemporary building shaped like a barn.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </section>
    <!-- end slider section -->
    


  </div>