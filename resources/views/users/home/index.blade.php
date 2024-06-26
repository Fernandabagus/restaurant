<!-- slider section -->
<section class="slider_section">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="img-box" style="background-image: url('image/slider/slider-1.jpg');"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Welcome to <br/> Prospero Barn</h1>
                <p>A stylish and contemporary restaurant shaped like a barn, where elegance meets comfort.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="img-box" style="background-image: url('image/slider/slider-2.jpg');"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Perfect Morning Coffee</h1>
                <p>Start your day with our freshly brewed coffee, made from the finest beans for a perfect pick-me-up.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="img-box" style="background-image: url('image/slider/slider-3.jpg');"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Freshly Baked Croissants</h1>
                <p>Indulge in our flaky, buttery croissants, baked fresh daily to perfection.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="img-box" style="background-image: url('image/slider/slider-4.jpg');"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Premium Tea Selection</h1>
                <p>Relax and unwind with our selection of premium teas, offering a moment of tranquility in every glass.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="img-box">
          <video class="video-box" autoplay loop muted>
            <source src="image/slider/slider-5.mp4" type="video/mp4">
          </video>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Grilled to Perfection: Steak</h1>
                <p>Savor the flavor of our perfectly grilled steak, cooked to your preference and served with delicious sides.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="img-box" style="background-image: url('image/slider/slider-6.jpg');"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Succulent Chicken Dishes</h1>
                <p>Enjoy our succulent and tender chicken dishes, prepared with the finest ingredients for a memorable meal.</p>
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
        <li data-target="#customCarousel1" data-slide-to="3"></li>
        <li data-target="#customCarousel1" data-slide-to="4"></li>
        <li data-target="#customCarousel1" data-slide-to="5"></li>
      </ol>
    </div>
  </div>
</section>

  <!-- end slider section -->

  <!-- end slider section -->

  <!-- offer section -->
  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">

            <div class="box ">

              <div class="img-box">
                <img src="{{ $foodTop->img_url }}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  {{ $foodTop->name }}
                </h5>
                <h6>
                  <span>@currency($foodTop->price)</span>
                </h6>

                <a href="">
                  Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029"
                    style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                       c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                       C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                       c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                       C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                       c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="{{$drinkTop->image}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  {{$drinkTop->name}}
                </h5>
                <h6>
                  <span>@currency($drinkTop->price)</span>
                </h6>
                <a href="">
                  Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029"
                    style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                       c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                       C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                       c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                       C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                       c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <div class="filters-content">
        <div class="row grid">
          <div class="container">
            <div class="row">
              <!-- Foods -->
              @foreach ($product as $p)
                <div class="col-sm-6 col-lg-4 all food">
                  <div class="box">
                    <div>
                      <div class="img-box">
                        @if ($p->img)
                          <img src="{{ asset('storage/'.$p->img) }}" alt="{{ $p->nama }}">
                        @endif
                      </div>
                      <div class="detail-box">
                      <h5>{{ $p->nama }}</h5>
                      <p>{{ $p->deskripsi }}</p>
                      <div class="options">
                        <h6>@currency($p->harga)</h6>
                        <a href="{{ route('order-food', $p->id) }}">
                          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029"
                            style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                            <g>
                            <g>
                              <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248
                                c0,29.184,23.552,53.248,53.248,53.248c29.184,0,53.248-23.552,53.248-53.248
                                C398.336,362.926,374.784,338.862,345.6,338.862z" />
                            </g>
                            </g>
                            <g>
                            <g>
                              <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304
                                C104.448,27.566,84.992,10.67,61.952,10.67H20.48C9.216,10.67,0,19.886,0,31.15
                                c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                C457.728,97.71,450.56,86.958,439.296,84.91z" />
                            </g>
                            </g>
                            <g>
                            <g>
                              <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688
                                c-29.696,1.536-52.224,26.112-51.2,55.296c1.024,28.16,24.064,50.688,52.224,50.688
                                h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                            </g>
                            </g>
                          </svg>
                        </a>
                        <a href="{{ route('set-review', $p->id) }}" class="btn btn-outline-primary" style="background-color: white; border: none">⭐</a>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="btn-box">
      <a href="{{ route('our-menu') }}">
        View More
      </a>
    </div>
    </div>
  </section>

  <!-- end food section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{asset('logo/logo.png')}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Stylish cafe serving Western & Asian fare in a contemporary building shaped like a barn.
            </p>
            <!-- <a href="">
                Read More
              </a> -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <section class="review_section layout_padding">
    <div class="gtco-testimonials">
      <div class="heading_container heading_center">
        <h2>
          Reviews
        </h2>
      </div>
      <div class="owl-carousel owl-carousel1 owl-theme">
        @foreach ($reviews as $review)
        <div>
        <div class="card text-center"><img class="card-img-top" src="{{$review->user?->img}}" alt="">
          <div class="card-body">
          <h5>{{$review->user?->name}}<br />
            <span class="star-rating">
            @for ($i = 1; $i <= 5; $i++)
              @if ($i <= $review->rating)
                <i class="fa fa-star"></i>
              @else
                <i class="fa fa-star-o"></i>
               @endif
            @endfor
            </span>
          </h5>
          <p class="card-text">“ {{$review->comment}} ” </p>
          </div>
        </div>
        </div>
      @endforeach
      </div>
    </div>
  </section>


  <!-- end client section -->

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" class="form-control" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Your Email" />
              </div>
              <div>
                <select class="form-control nice-select wide">
                  <option value="" disabled selected>
                    How many persons?
                  </option>
                  <option value="">
                    2
                  </option>
                  <option value="">
                    3
                  </option>
                  <option value="">
                    4
                  </option>
                  <option value="">
                    5
                  </option>
                </select>
              </div>
              <div>
                <input type="date" class="form-control">
              </div>
              <div class="btn_box">
                <button>
                  Book Now
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->
