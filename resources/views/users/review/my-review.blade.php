@if (isset($reviews))
    <div style="height: 550px;">
        <div class="col-md-12">
            @foreach ($reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
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
@endif
{{-- @else --}}

@if (!$reviews)
    <div style="">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="review-text">
                        <h4 class="card-title">
                            Tidak ada review dari anda
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- @endif --}}
