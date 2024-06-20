 <!-- book section -->
 <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form_container">
            <form action="{{ route('store-book-table') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
              <div>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled />
              </div>
              <div>
                <input type="text" class="form-control" value="{{ Auth::user()->phone }}"  />
              </div>
              <div>
                <input type="email" class="form-control" value="{{ Auth::user()->email }}" />
              </div>
              <div>
              <input type="number" class="form-control" name="many_person" placeholder="How many people ?" />
              </div>
              <div>
                <input type="date" name="book_date" class="form-control">
              </div>
              <div class="btn_box">
                <button>
                  Book Now
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->
