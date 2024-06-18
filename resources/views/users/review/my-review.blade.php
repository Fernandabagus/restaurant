<head>
    <!-- SweetAlert CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <!-- book section -->

    @if (isset($menu))
        <section class="book_section mt-5 mb-5">
            <div class="container">
    @endif
    <div class="heading_container heading_center">
        <h3>
            Give your review on our product🙏🏻
        </h3>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @foreach ($reviews as $review)
                    <div class="card mb-3">
                        <div class="card-body">
                            {{-- <div class="user-img">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                            </div> --}}
                            <div class="review-text">
                                <h4 class="card-title">
                                    {{ $review->product->nama }}
                                </h4>
                                <div class="rating">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                </div>
                                <p class="card-text">
                                    {{ $review->comment }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </section>
    <!-- end book section -->

    <!-- SweetAlert JS -->

</body>
