  <!-- footer section -->
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
                        <a href="https://maps.app.goo.gl/8FQgqfL3ocTaZEYt7" target="_blank">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Jl. Flamboyan, Kenteng - Tegalrejo, Kumpulrejo, Argomulyo, Salatiga 50733
                            </span>
                        </a>
                        <a href="https://wa.me/+6285280800889">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                0852 8080 0889
                            </span>
                        </a>
                        <a href="https://www.instagram.com/prosperobarn/" target="_blank">
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

                    
                    <!-- Google Maps Iframe -->
                    <div style="margin-top: 20px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.984356068169!2d110.49346547500056!3d-7.355649292653307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a7924d41d6329%3A0xff92ec1a01909ce9!2sProspero%20Barn%20%7C%20Cafe%20Salatiga!5e0!3m2!1sen!2sid!4v1718897267204!5m2!1sen!2sid"
                            width="100%"
                            height="150"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                        ></iframe>
                    </div>
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
                    10.00 AM - 10.00 PM
                </p>
                <p>
                    Close Order at 09.30 PM
                </p>
            </div>
        </div>
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

<script>
        document.addEventListener('DOMContentLoaded', function () {
            (function () {
                "use strict";

                var carousels = function () {
                    $(".owl-carousel1").owlCarousel({
                        loop: true,
                        center: true,
                        margin: 0,
                        responsiveClass: true,
                        nav: false,
                        responsive: {
                            0: {
                                items: 1,
                                nav: false
                            },
                            680: {
                                items: 2,
                                nav: false,
                                loop: false
                            },
                            1000: {
                                items: 3,
                                nav: true
                            }
                        }
                    });
                };

                (function ($) {
                    carousels();
                })(jQuery);
            })();
        });
    </script>
  <!-- End Google Map -->


  </body>


  </html>
