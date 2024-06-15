 <!-- book section -->
 <section class="book_section mt-5 mb-5">
     <div class="container">
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
                                 <form action="{{ route('review.store') }}" method="POST">
                                     @csrf
                                     <div>
                                         <input type="text" name="id_product" placeholder="Product" class="form-control" />
                                         <x-input-error class="mt-2" :messages="$errors->get('id_product')" />
                                     </div>
                                     <div class="mb-3">
                                         <label for="disabledSelect" class="form-label">Rating</label>
                                         <select id="disabledSelect" name="rating" class="form-select">
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
                                         <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2"
                                             style="height: 100px"></textarea>
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
                 <div class="col-md-6">
                    @foreach ($reviews as $review)
                        <div class="card mb-3">
                            <div class="card-body">
                                {{-- <div class="user-img">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                            </div> --}}
                                <div class="review-text">
                                    <h4 class="card-title">
                                        {{ $review->id_product }}
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
