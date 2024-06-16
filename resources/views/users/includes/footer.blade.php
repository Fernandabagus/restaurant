  <!-- footer section -->
  <footer class="footer_section">
      <div class="container">
          <div class="row">
              <div class="col-md-4 footer-col">
                  <div class="footer_contact">
                      <h4>
                          Contact Us
                      </h4>
                      <div class="contact_link_box">
                          <a href="">
                              <i class="fa fa-map-marker" aria-hidden="true"></i>
                              <span>
                                  Jl. Flamboyan, Kenteng - Tegalrejo, Kumpulrejo, Argomulyo, Salatiga 50733
                              </span>
                          </a>
                          <a href="">
                              <i class="fa fa-phone" aria-hidden="true"></i>
                              <span>
                                  0852 8080 0889
                              </span>
                          </a>
                          <a href="">
                              <i class="fa fa-instagram" aria-hidden="true"></i>
                              <span>
                                  prosperobarn
                              </span>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                      <a href="" class="footer-logo">
                          Prospero Barn
                      </a>
                      <p>
                          Stylish cafe serving Western & Asian fare in a contemporary building shaped like a barn.
                      </p>
                      <!-- <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div> -->
                  </div>
              </div>
              <div class="col-md-4 footer-col">
                  <h4>
                      Opening Hours
                  </h4>
                  <p>
                      Everyday
                  </p>
                  <p>
                      10.00 Am -10.00 Pm
                  </p>
              </div>
          </div>
          <!-- <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div> -->
      </div>
  </footer>
  <!-- footer section -->

  <!-- script for isotope -->



  <!-- jQery -->
  <script src="{{ asset('feane-1.0.0\js/jquery-3.4.1.min.js') }}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="{{ asset('feane-1.0.0\js/bootstrap.js') }}"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="{{ asset('feane-1.0.0\js/custom.js') }}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('success'))
      <script>
          let timerInterval;
          Swal.fire({
              title: "Success!",
              icon: "success",
              html: "{{ session('success') }}",
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                  Swal.showLoading();
                  const timer = Swal.getPopup().querySelector("b");
                  timerInterval = setInterval(() => {
                      timer.textContent = `${Swal.getTimerLeft()}`;
                  }, 100);
              },
              willClose: () => {
                  clearInterval(timerInterval);
              }
          }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
              }
          });
      </script>
  @endif


  <!-- End Google Map -->

  </body>

  </html>
