<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Pesan Makanan
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="{{ route('process-my-order', $food->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="">Nama :</label>
                            <input type="text" class="form-control" placeholder="{{ Auth::user()->name }}" readonly />
                        </div>
                        <div>
                            <label for="">Makanan :</label>
                            <input type="text" class="form-control" placeholder="{{ $food->name }}" readonly />
                        </div>
                        <div>
                            <label for="">Harga :</label>
                            <input type="email" class="form-control" placeholder="{{ $food->price }}" readonly />
                        </div>
                        <div>
                            <label for="">Deskripsi :</label>
                            <input type="email" class="form-control" placeholder="{{ $food->description }}"
                                readonly />
                        </div>
                        <div>
                            <label for="">Jumlah :</label>
                            <input type="number" name="quantity" class="form-control" />
                        </div>
                        {{-- <div>
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
              </div> --}}
                        <div class="btn_box">
                            {{-- <a href="#"> --}}
                            <button type="submit">Pesan</button>
                            {{-- </a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
