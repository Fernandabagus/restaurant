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
                        <div class="card">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <div class="form_container">
                                    <form action="{{ route('review.store', $menu->id) }}" method="POST">
                                        @csrf
                                        <div>
                                            <input type="text" value="{{ $menu->nama }}" class="form-control" readonly />
                                            <input type="hidden" name="id_product" value="{{ $menu->id }}">
                                            {{-- <x-input-error class="mt-2" :messages="$errors->get('product')" /> --}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledSelect" class="form-label">Rating</label>
                                            <select id="disabledSelect" name="rating" class="form-control">
                                                <option value="">Choose...</option>
                                                <option value="1">⭐</option>
                                                <option value="2">⭐⭐</option>
                                                <option value="3">⭐⭐⭐</option>
                                                <option value="4">⭐⭐⭐⭐</option>
                                                <option value="5">⭐⭐⭐⭐⭐</option>
                                            </select>
                                            <x-input-error class="mt-2" :messages="$errors->get('rating')" />
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="floatingTextarea2">Comments</label>
                                            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                                        </div>
                                        <div class="btn_box">
                                            <button type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->

    <!-- SweetAlert JS -->

</body>
